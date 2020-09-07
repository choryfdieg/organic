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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/home/{nombre?}/{apellido?}', function ($nombre = 'sin nonmbre', $apellido = 'sin apellido') {

//     $post = ['Post1', 'Post2', 'Post3', 'Post4'];

//     return view('home', ['post' => $post, 'nombre' => $nombre, 'apellido' => $apellido]);
// })->name('home');

//Route::get('/post', 'PostController@index');

Route::resource('dashboard/post', 'dashboard\PostController');
Route::post('dashboard/post/{post}/image', 'dashboard\PostController@image')->name('post.image');

Route::resource('dashboard/category', 'dashboard\CategoryController');