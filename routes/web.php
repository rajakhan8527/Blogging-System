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
// Frontend Routes Here
// Route::get('/', function () {
//     return view('welcome');
// });
//---------------Only for Frontend Here-----------//
Route::get('/', 'Web\HomeController@index');
//Route::get('/{slug}/{id}', 'Web\HomeController@digitalmarketing');



//---------Only For Admin Here ----------//
//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware'=>['auth']], function(){

Route::get('/dashboard', 'Admin\AdminController@index');

//Users
Route::get('/admin/bloguser', 'Admin\BlogUserController@index');
Route::get('/admin/bloguser/create', 'Admin\BlogUserController@create');
Route::post('/admin/bloguser/save', 'Admin\BlogUserController@save');
Route::get('/admin/bloguser/post/{id}', 'Admin\BlogUserController@indexpost');
Route::get('/admin/bloguser/edit/{id}', 'Admin\BlogUserController@edit');
Route::post('/admin/bloguser/update', 'Admin\BlogUserController@update');
Route::get('/admin/bloguser/delete/{id}', 'Admin\BlogUserController@destroy');


//Category
Route::get('/admin/bloguser/category/create', 'Admin\CategoryController@create');
Route::post('/admin/bloguser/category/save', 'Admin\CategoryController@save');
Route::get('/admin/bloguser/category', 'Admin\CategoryController@index');
Route::get('/admin/bloguser/category/edit/{id}', 'Admin\CategoryController@edit');
Route::post('/admin/bloguser/category/update', 'Admin\CategoryController@update');
Route::get('/admin/bloguser/category/delete/{id}', 'Admin\CategoryController@destroy');

//Posts
Route::get('/admin/bloguser/post/create/{id}', 'Admin\PostController@create');
Route::post('/admin/bloguser/post/save', 'Admin\PostController@save');
Route::get('/admin/bloguser/post/comment/{id}', 'Admin\PostController@indexcomment');
Route::get('/admin/bloguser/post/edit/{id}', 'Admin\PostController@edit');
Route::post('/admin/bloguser/post/update', 'Admin\PostController@update');
Route::get('/admin/bloguser/post/delete/{id}', 'Admin\PostController@destroy');

//Comments
Route::get('/admin/bloguser/post/comment/create/{id}', 'Admin\CommentController@create');
Route::post('/admin/bloguser/post/comment/save', 'Admin\CommentController@save');
Route::get('/admin/bloguser/post/comment/edit/{id}', 'Admin\CommentController@edit');
Route::post('/admin/bloguser/post/comment/update', 'Admin\CommentController@update');
Route::get('/admin/bloguser/post/comment/delete/{id}', 'Admin\CommentController@destroy');


});