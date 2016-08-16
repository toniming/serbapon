<?php

		Route::get('/','HomeController@home');
		Route::any('form-submit', function(){
		 var_dump(Input::file('file'));
		 return Input::file('file')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('file')->getClientOriginalName());
		});
		Route::get('/registrasi/{id}','UserController@registrasi');
		Route::post('/login', 'UserController@login');
		Route::get('/logout','UserController@logout');
		Route::post('/create','UserController@create');
		Route::get('/info','HomeController@info');
		Route::get('/kupon/detail/{id}', 'HomeController@kupon_detail');
		Route::get('/promo', 'HomeController@promo');
		Route::get('/aktivasi', 'HomeController@aktivasi');
		Route::get('/signin', 'HomeController@signin');
		Route::get('/edit/{id}','HomeController@edit');
		Route::get('destroy/{id}','HomeController@destroy');
		Route::post('/update','HomeController@update');
		Route::post('/submit', 'HomeController@submit');
		Route::resource('books','BookController');
		Route::post('/sendemail', 'EmailController@confirm');