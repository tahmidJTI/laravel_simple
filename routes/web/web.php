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

});


    Route::middleware(['role:admin','auth'])->group(function (){
        Route::get('admin/users','UserController@index')->name('users.index');
        Route::put('/users/{user}/attach','UserController@attach')->name('user.role.attach');
        Route::put('/users/{user}/detach','UserController@detach')->name('user.role.detach');
    });

    Route::middleware('can:view,user')->group(function (){
        Route::put('admin/posts/{user}/update/user', 'UserController@update')->name('user.profile.update');
    });

    Route::middleware('role:admin')->group(function (){
        Route::get('admin/users','UserController@index')->name('users.index');
});
