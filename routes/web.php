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

    Route::group(['middleware' => 'admin'], function() {
        Route::get('/admin', 'Admin\AdminController@index')->name('admin');

        Route::get('/admin/posts', 'PostController@index')->name('posts');
        Route::get('/admin/post/create', 'PostController@create')->name('post.create');
        Route::post('/admin/post', 'PostController@store')->name('post.store');

        Route::get('/admin/post/{post}/edit', 'PostController@edit')->name('post.edit');
        Route::put('/admin/post/{post}', 'PostController@update')->name('post.update');
        
        Route::post('/admin/post/{post}', 'PostController@assignStatus')->name('post.assign');
        
        Route::delete('/admin/post/{post}', 'PostController@destroy')->name('post.destroy');

        Route::get('/admin/users', 'UserController@index')->name('users');
        // Route::get('admin/user/create', 'UserController@create')->name('user.create');

        Route::get('/admin/user/{user}/profile', 'UserController@edit')->name('user.profile');
        Route::put('/admin/user/{user}', 'UserController@update')->name('user.update');

        Route::post('/admin/user/{user}', 'UserController@assignRole')->name('user.assign');

        Route::delete('/admin/user/{user}', 'UserController@destroy')->name('user.destroy');
    
    });

    

});


