<?php

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

Route::group(['namespace'=> 'Blog'], function(){
	Route::name('/')->get('/', 'HomeController@index');

	//post
	Route::name('single-post')->get('post/{id}', 'PostsController@show');
	Route::name('blog.search')->get('search', 'PostsController@search');
	//category 
	Route::name('category')->get('category', 'CategoryController@index');
});

///
//category 

