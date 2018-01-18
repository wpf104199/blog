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
    return redirect('/posts');
});
Route::get('/register','\App\Http\Controllers\RegisterController@index');
Route::post('/register','\App\Http\Controllers\RegisterController@register');
Route::get('/login','\App\Http\Controllers\LoginController@index');
Route::post('/login','\App\Http\Controllers\LoginController@login');
Route::get('/logout','\App\Http\Controllers\LoginController@logout');

Route::get('/user/my/setting','\App\Http\Controllers\UserController@setting');
Route::get('/user/{user}','\App\Http\Controllers\UserController@index');
Route::post('/user/my/setting','\App\Http\Controllers\UserController@settingStore');

Route::post('/user/{user}/fan','\App\Http\Controllers\UserController@doFan');
Route::post('/user/{user}/unfan','\App\Http\Controllers\UserController@doUnfan');

Route::get('/posts','\App\Http\Controllers\PortController@index');
Route::get('/posts/create','\App\Http\Controllers\PortController@create');
Route::get('/posts/{post}','\App\Http\Controllers\PortController@show');
Route::post('/posts','\App\Http\Controllers\PortController@add');
Route::post('/posts/{post}/comment','\App\Http\Controllers\PortController@comment');
Route::get('/posts/{post}/edit','\App\Http\Controllers\PortController@edit');
Route::put('/posts/{post}','\App\Http\Controllers\PortController@update');
Route::get('/posts/{post}/delete','\App\Http\Controllers\PortController@delete');
Route::get('/posts/{post}/zan','\App\Http\Controllers\PortController@zan');
Route::get('/posts/{post}/unzan','\App\Http\Controllers\PortController@unzan');

Route::get('/notices','\App\Http\Controllers\NoticesController@index');