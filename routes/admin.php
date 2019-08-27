<?php 

Route::group(['prefix'=> 'admin', 'namespace' => 'Admin'], function(){
	Config::set('auth.defines', 'admin');
	Route::name('admin.login')->get('login', 'AdminAuthController@login');
	Route::name('admin.login')->post('login' ,'AdminAuthController@isLogin');
	Route::name('forgot_password')->get('forgot/password' ,'AdminAuthController@forgot_password');
	Route::name('forgot_password')->post('forgot/password' ,'AdminAuthController@forgot_password_post');
	Route::name('reset_password')->get('reset/password/{token}', 'AdminAuthController@reset_password');
	Route::name('reset_password')->post('reset/password/{token}', 'AdminAuthController@reset_password_post');

	Route::group(['middleware' => 'admin:admin'], function(){
		Route::name('admin.home')->get('/', function()
			{
				return view('admin.home');
			});	
		Route::name('admin.logout')->any('logout', 'AdminAuth@logout');

		//blog
		Route::name('admin.blog')->get('blog', 'BlogController@index');
		Route::name('admin.blog.slider')->post('blog/slider', 'BlogController@addSlider');
		Route::name('admin.blog.delete-slider')->get('blog/slider/{id}', 'BlogController@deleteSlider');

		
		//admins 
		Route::name('admin')->get('admins', 'AdminController@index');
		Route::name('admin.create')->get('admin/create','AdminController@create');	
		Route::name('admin.store')->post('admin/store','AdminController@store');		
		Route::name('admin.edit')->get('admin/edit/{id}','AdminController@edit');
		Route::name('admin.update')->post('admin/update/{id}','AdminController@update');	
		Route::name('admin.delete')->get('admin/delete/{id}','AdminController@destroy');
		// Posts 
		Route::name('admin.posts')->get('posts', 'PostController@index');
		Route::name('admin.create_post')->get('post/create','PostController@create');	
		Route::name('admin.store_post')->post('post/store','PostController@store');		
		Route::name('admin.edit_post')->get('post/edit/{id}','PostController@edit');
		Route::name('admin.update_post')->post('post/update/{id}','PostController@update');	
		Route::name('admin.delete_post')->get('post/delete/{id}','PostController@destroy');	
		
		//Categories
		Route::name('admin.categories')->get('category', 'CategoryController@index');
		Route::name('admin.create_category')->get('category/create','CategoryController@create');
		Route::name('admin.store_category')->post('category/store','CategoryController@store');			
		Route::name('admin.edit_category')->get('category/edit/{id}','CategoryController@edit');	
		Route::name('admin.update_category')->post('category/update/{id}','CategoryController@update');	
		Route::name('admin.delete_category')->get('category/delete/{id}','categoryController@destroy');	

		//Tags
		Route::name('admin.tags')->get('tags', 'TagController@index');
		Route::name('admin.create_tag')->get('tag/creaTagte','TagController@create');
		Route::name('admin.store_tag')->post('tag/store','TagController@store');			
		Route::name('admin.edit_tag')->get('tag/edit/{id}','TagController@edit');	
		Route::name('admin.update_tag')->post('tag/update/{id}','TagController@update');	
		Route::name('admin.delete_tag')->get('tag/delete/{id}','TagController@destroy');		


});	


});
