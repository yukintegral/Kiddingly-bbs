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

// Route::get('/', function () {
// return view('posts.index');
// });

Route::get('/', 'PostsController@index')->name('top');

Route::resource('posts', 'PostsController', ['only' => ['create', 'store']]); //投稿画面の作成

Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show']]);

Route::resource('comments', 'CommentsController', ['only' => ['store']]);
