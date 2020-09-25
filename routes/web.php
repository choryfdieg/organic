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

Route::resource('dashboard/product', 'dashboard\ProductController');
Route::resource('dashboard/member', 'dashboard\MemberController');
Route::resource('dashboard/post', 'dashboard\PostController');
Route::post('dashboard/post/{post}/image', 'dashboard\PostController@image')->name('post.image');

Route::resource('dashboard/category', 'dashboard\CategoryController');
Route::resource('dashboard/user', 'dashboard\UserController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/', 'web\WebController@index')->name('index');
Route::get('/detail/{id}', 'web\WebController@detail')->name('detail');
Route::get('/post/{id}/category', 'web\WebController@postCategory')->name('post.category');
Route::get('/contact', 'web\WebController@contact')->name('contact');
Route::get('/categories', 'web\WebController@categories')->name('categories');