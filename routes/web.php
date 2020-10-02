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

Route::resource('dashboard/post-comment', 'dashboard\PostCommentController')->only(['index', 'show', 'destroy']);
Route::resource('dashboard/contact', 'dashboard\ContactController')->only(['index', 'show', 'destroy']);
Route::resource('dashboard/product', 'dashboard\ProductController');
Route::resource('dashboard/vendor', 'dashboard\VendorController');
Route::resource('dashboard/post', 'dashboard\PostController');


Route::post('dashboard/post/{post}/image', 'dashboard\PostController@image')->name('post.image');
Route::get('dashboard/post/{image}/image-download', 'dashboard\PostController@downloadImage')->name('post.image-download');
Route::delete('dashboard/post/{image}/image-delete', 'dashboard\PostController@deleteImage')->name('post.image-delete');

Route::post('dashboard/vendor/{vendor}/image', 'dashboard\VendorController@image')->name('vendor.image');
Route::get('dashboard/vendor/{image}/image-download', 'dashboard\VendorController@downloadImage')->name('vendor.image-download');
Route::delete('dashboard/vendor/{image}/image-delete', 'dashboard\VendorController@deleteImage')->name('vendor.image-delete');


Route::get('dashboard/post-comment/{post}/post', 'dashboard\PostCommentController@postComments')->name('post-comment.post');
Route::get('dashboard/post-comment/{postComment}/comment', 'dashboard\PostCommentController@getComment')->name('post-comment.comment');
Route::put('dashboard/post-comment/{postComment}/status-comment', 'dashboard\PostCommentController@putStatusComment')->name('post-comment.status-comment');

Route::resource('dashboard/category', 'dashboard\CategoryController');
Route::resource('dashboard/user', 'dashboard\UserController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'web\WebController@index')->name('index');
Route::get('/detail/{id}', 'web\WebController@detail')->name('detail');
Route::get('/post/{id}/category', 'web\WebController@postCategory')->name('post.category');
Route::get('/contact', 'web\WebController@contact')->name('contact');
Route::get('/categories', 'web\WebController@categories')->name('categories');

// contacto verde
Route::get('/contactoverde', 'web\WebController@contactoVerde')->name('contactoverde');
Route::get('/contactoverde/tienda/{urlClean}', 'dashboard\VendorController@view')->name('tienda.view');
