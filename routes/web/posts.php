<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', 'AdminsController@index')->name('admin.index');
Route::get('admin/posts/create', 'PostController@create')->name('post.create');
Route::post('admin/posts/', 'PostController@store')->name('post.store');
Route::delete('admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
Route::get('admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');
Route::put('admin/posts/{post}/update', 'PostController@update')->name('post.update');
Route::get('admin/posts/', 'PostController@index')->name('post.index');
