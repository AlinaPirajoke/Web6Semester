<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('guest_book/main', 'App\Http\Controllers\GuestBookController@index')->name('guestBook.index');
Route::post('guest_book/main', 'App\Http\Controllers\GuestBookController@store')->name('guestBook.store');

Route::get('guest_book/upload', 'App\Http\Controllers\GuestBookUploadController@index')->name('guestBookUpload.index');
Route::post('guest_book/upload', 'App\Http\Controllers\GuestBookUploadController@upload')->name('guestBookUpload.upload');

Route::get('testAnswer', 'App\Http\Controllers\TestAnswerController@index')->name('testAnswer.index');

Route::get('blog', 'App\Http\Controllers\BlogController@index')->name('blog.index');
Route::post('blog', 'App\Http\Controllers\BlogController@store')->name('blog.store');

Route::get('blogUpload', 'App\Http\Controllers\BlogUploadController@index')->name('blogUpload.index');
Route::post('blogUpload', 'App\Http\Controllers\BlogUploadController@upload')->name('blogUpload.upload');
Route::get('blogDownload', 'App\Http\Controllers\BlogUploadController@download')->name('blogUpload.download');
