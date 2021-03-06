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
});

Auth::routes();


Route::get('/admin', 'App\Http\Controllers\AdminController@index');

Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::resource('posts','App\Http\Controllers\PostsController');