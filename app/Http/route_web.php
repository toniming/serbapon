<?php

Route::get('/', 	['uses' => 'Web\\HomeController@home',					'as' => 'home']);
Route::post('/', 	['uses' => 'Web\\HomeController@home',					'as' => 'home']);
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