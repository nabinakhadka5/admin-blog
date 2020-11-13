<?php

use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::group(['namespace' => 'Front'],function(){
    Route::get('/','HomePageController@index')->name('home');
    Route::get('/post/{post}','PostController@index')->name('post');
    Route::get('/post/category/{category}','HomePageController@category')->name('category');
    Route::get('/post/tag/{tag}','HomePageController@tag')->name('tag');
    // Category Routes

});

Route::group(['namespace' => 'Admin','middleware'=>'auth:superadmin'],function(){
    Route::get('admins','HomeController@index')->name('admin.home');
    // Post route
	Route::resource('admin/post','PostController');
    // Category Routes
    Route::resource('admin/category','CategoryController');
    // Tag Routes
    Route::resource('admin/tag','TagController');


    // Admin Login
    Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login','Auth\LoginController@login');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
