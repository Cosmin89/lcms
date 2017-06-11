<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/post/{post}', 'PostController@show')->name('post.show');
    Route::get('/category/{category}', 'CategoryController@show')->name('category.show');
    Route::post('/post/{post}/comment', 'CommentController@store')->name('comment.store');
});
