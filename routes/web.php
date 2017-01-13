<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\User;
use Faker\Factory as Faker;
use App\Post;
use Illuminate\Support\Facades\File;
use App\Avatar;


//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('admin/users', 'AdminUsersController');

Route::resource('/usuarios', 'PruebaController');

Route::resource('/perfil', 'PerfilController');

Route::get('/post/view', 'PostController@showPosts');


Route::resource('/posts', 'PostController');

//Route::get('/posts/edit', 'PostController@showPosts');
//Route::get('/posts/edit', 'PostController');


