<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Rules\CsvFileExtension;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class BlogUploadController extends Controller
{
    function index()
    {
        return view('blogUpload');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:2048', new CsvFileExtension()]
        ]);

        $filename = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('csv', $filename, 'public');

        $file = fopen(storage_path("app/public/{$path}"), "r");

        $header = fgetcsv($file);

        BlogModel::truncate();
        while ($row = fgetcsv($file)) {
            $data = array_combine($header, $row);

            $post = new BlogModel([
                'title' => $data['title'],
                'message' => $data['message'],
            ]);

            if (!empty($data['image_base64'])) {
                // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['image_base64']));
                // $imageName = time() . '_' . Str::uuid() . '.jpg';
                // $imagePath = public_path('uploads/images/' . $imageName);
                // file_put_contents($imagePath, $imageData);
                $post->image = $data['image_base64'];
            }

            $post->created_at = \Carbon\Carbon::parse($data['created_at']);
            $post->save();
        }

        fclose($file);

        return back()->with('success', 'Your data have been submitted successfully.');
    }

    public function download()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=blog_posts.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        $blogPosts = BlogModel::all();
        $columns = ['title', 'message', 'created_at', 'image_base64'];

        $callback = function () use ($blogPosts, $columns) {
            // dd($blogPosts);
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($blogPosts as $posts) {
                if ($posts->image) {
                    $imagePath = public_path('images/' . $posts->image);
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $posts->image_base64 = 'data:image/jpeg;base64,' . $imageData;
                }
                fputcsv($file, [$posts->title, $posts->message, $posts->created_at, $posts->image_base64]);
            }
            fclose($file);
        };
        $posts = BlogModel::all();;
        $callback = function () use ($posts, $columns) {
            // dd($posts);
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($posts as $post) {
                fputcsv($file, [$post->title, $post->message, $post->created_at, $post->image]);
            }

            fclose($file);
        };
        
        return Response::stream($callback, 200, $headers);
    }
}
