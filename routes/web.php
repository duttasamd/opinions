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

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/fetchautocomplete', 'HomeController@fetchautocomplete')->name('fetchautocomplete');


Route::post('/post/create', 'PostController@create')->name('post.create');
Route::get('/post/create', 'PostController@create')->name('post.create');

Route::post('/post', 'PostController@store')->name('post.store');


Route::get('/util/getcategories', 'UtilController@getcategories')->name('getcategories');

Route::get('/post/{post_id}', 'PostController@show')->name('post.show');

