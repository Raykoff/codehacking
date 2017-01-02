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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('admin/users', 'AdminUsersController');

Route::resource('/usuarios', 'PruebaController');

Route::resource('/perfil', 'PerfilController');

Route::get('/borrarUsuarios', function(){

   $users = User::where('role_id', 2);

    $users->delete();


});
