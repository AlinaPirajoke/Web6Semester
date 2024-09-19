<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
Route::middleware(\App\Http\Middleware\CollectStatistics::class)->group(function () {

Route::get('/', "App\Http\Controllers\MainController@index");

Route::get('/main', "App\Http\Controllers\MainController@index");
Route::get('/photo', "App\Http\Controllers\PhotoController@index");
Route::get('/about', "App\Http\Controllers\AboutController@index");
Route::get('/contact', "App\Http\Controllers\ContactController@index");
Route::get('/history', "App\Http\Controllers\HistoryController@index");
Route::get('/studying', "App\Http\Controllers\StudyingController@index");
Route::get('/test', "App\Http\Controllers\TestController@index");
Route::get('/interests', "App\Http\Controllers\InterestsController@index");

Route::post('/contact', "App\Http\Controllers\ContactController@validate");
Route::post('/test', "App\Http\Controllers\TestController@validate");

Route::get('guestBook', 'App\Http\Controllers\GuestBookController@index')->name('guestBook.index');
Route::post('guestBook', 'App\Http\Controllers\GuestBookController@store')->name('guestBook.store');

Route::middleware('auth')->group(function () {
    Route::get('testAnswer', 'App\Http\Controllers\TestAnswerController@index')->name('testAnswer.index');
});

Route::get('blog', 'App\Http\Controllers\BlogController@index')->name('blog.index');
Route::post('blog', 'App\Http\Controllers\BlogController@store')->name('blog.store');

Route::middleware('\App\Http\Middleware\Admin::class')->group(function () {
    Route::get('statistics', 'App\Http\Controllers\StatisticController@index')->name('statistics.index');

    Route::get('blogUpload', 'App\Http\Controllers\BlogUploadController@index')->name('blogUpload.index');
    Route::post('blogUpload', 'App\Http\Controllers\BlogUploadController@upload')->name('blogUpload.upload');
    Route::get('blogDownload', 'App\Http\Controllers\BlogUploadController@download')->name('blogUpload.download');

    Route::get('guestBookUpload', 'App\Http\Controllers\GuestBookUploadController@index')->name('guestBookUpload.index');
    Route::post('guestBookUpload', 'App\Http\Controllers\GuestBookUploadController@upload')->name('guestBookUpload.upload');

    Route::delete('blog/{id}', 'App\Http\Controllers\BlogController@delete')->name('blog.delete');
    Route::get('blog/{id}', 'App\Http\Controllers\BlogController@edit')->name('blog.edit');
    Route::put('blog/{id}', 'App\Http\Controllers\BlogController@update')->name('blog.update');
});

Route::middleware(['\App\Http\Middleware\Role::class'])->group(function () {
    Route::delete('blog/{id}', 'App\Http\Controllers\BlogController@delete')->name('blog.delete');
    Route::get('blog/{id}', 'App\Http\Controllers\BlogController@edit')->name('blog.edit');
    Route::put('blog/{id}', 'App\Http\Controllers\BlogController@update')->name('blog.update');
});
});

Route::get('checkUniqueLogin', 'App\Http\Controllers\Api\RegisteredUserController@checkUniqueLogin')->name('checkLogin');
Route::post('blog/update', 'App\Http\Controllers\Api\BlogController@update')->name('blog.update');
Route::post('blog/comments', 'App\Http\Controllers\Api\BlogCommentController@store')->name('comment.store');

require __DIR__.'/auth.php';
