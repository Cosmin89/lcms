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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{category}', 'CategoryController@show')->name('category.show');
Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/tag/{tag}', 'TagController@show')->name('tag.show');
Route::post('/search', 'HomeController@search')->name('search');

Route::group(['middleware' => 'auth'], function() {

    Route::post('/post/{post}/comment', 'CommentController@store')->name('comment.store');

    Route::group(['middleware' => 'admin'], function() {
        Route::prefix('admin')->group(function() {
            Route::get('/', 'Admin\AdminController@index')->name('admin');

            Route::get('posts', 'PostController@index')->name('posts');
            Route::get('post/create', 'PostController@create')->name('post.create');
            Route::post('post', 'PostController@store')->name('post.store');

            Route::get('post/{post}/edit', 'PostController@edit')->name('post.edit');
            Route::put('post/{post}', 'PostController@update')->name('post.update');
            
            Route::post('post/{post}', 'PostController@assignStatus')->name('post.assign');
            
            Route::delete('post/{post}', 'PostController@destroy')->name('post.destroy');

            Route::get('categories', 'CategoryController@index')->name('categories');
            Route::post('category', 'CategoryController@store')->name('category.store');

            Route::get('category/{category}', 'CategoryController@edit')->name('category.edit');
            Route::put('category/{category}', 'CategoryController@update')->name('category.update');

            Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy');

            Route::get('users', 'UserController@index')->name('users');
            Route::get('admin/user/create', 'UserController@create')->name('user.create');
            Route::post('admin/user', 'UserController@store')->name('user.store');

            Route::get('user/{user}/profile', 'UserController@edit')->name('user.profile');
            Route::put('user/{user}', 'UserController@update')->name('user.update');

            Route::post('user/{user}', 'UserController@assignRole')->name('user.assign');

            Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');

            Route::get('comments', 'CommentController@index')->name('comments');
            
            Route::post('comment/{comment}', 'CommentController@approveComment')->name('comment.approve');
            Route::delete('comment/{comment}', 'CommentController@destroy')->name('comment.destroy');
        });
    });

    

});


