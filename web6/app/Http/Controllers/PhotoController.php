<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PhotoModel;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    private $galleryModel;
    public function __construct(PhotoModel $galleryModel)
    {
        $this->galleryModel = $galleryModel;
    }

    public function index(){
        $vars = [
            'args'=>$this->galleryModel->photoModel(),
        ];
        return view("photo", $vars);
    }
}
