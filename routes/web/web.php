<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');

Route::middleware('auth')->group(function (){


    Route::get('admin/posts/clearImage', 'PostController@clear')->name('post.clear');
    Route::put('admin/posts/{user}/update/user', 'UserController@update')->name('user.profile.update');
    Route::delete('admin/users/{user}/destroy','UserController@destroy')->name('users.destroy');
    Route::get('/admin/users/{user}/profile','UserController@show')->name('user.profile.show');


<<<<<<< HEAD:routes/web/web.php
=======
<<<<<<< HEAD:routes/web/web.php
>>>>>>> b5c000d45e579e5902e530ec5f44db1efda8780f:routes/web.php
    Route::middleware(['role:admin','auth'])->group(function (){
        Route::get('admin/users','UserController@index')->name('users.index');
        Route::put('/users/{user}/attach','UserController@attach')->name('user.role.attach');
        Route::put('/users/{user}/detach','UserController@detach')->name('user.role.detach');
    });

    Route::middleware('can:view,user')->group(function (){
        Route::put('admin/posts/{user}/update/user', 'UserController@update')->name('user.profile.update');
<<<<<<< HEAD:routes/web/web.php
=======
=======
    Route::middleware('role:admin')->group(function (){
        Route::get('admin/users','UserController@index')->name('users.index');
>>>>>>> 101db6b50438749230d3c2a16a55e0f8a861e046:routes/web.php
>>>>>>> b5c000d45e579e5902e530ec5f44db1efda8780f:routes/web.php
    });
});
