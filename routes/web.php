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
Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::get('/category/{category}', 'CategoryController@show')->name('category.show');
Route::post('/search', 'HomeController@search')->name('search');

Route::group(['middleware' => 'auth'], function() {
    Route::post('/post/{post}/comment', 'CommentController@store')->name('comment.store');
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');

    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    Route::get('/admin/post/create', 'PostController@create')->name('post.create');
    Route::post('/admin/post', 'PostController@store')->name('post.store');

    
    Route::get('/admin/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::put('/admin/post/{post}', 'PostController@update')->name('post.update');
    
    Route::delete('/admin/post/{post}', 'PostController@destroy')->name('post.destroy');
    
});


