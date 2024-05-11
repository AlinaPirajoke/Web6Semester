<?php

use Illuminate\Support\Facades\Route;

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
