<?php

		Route::get('/','HomeController@home');
		Route::any('form-submit', function(){
		 var_dump(Input::file('file'));
		 return Input::file('file')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('file')->getClientOriginalName());
		});

		//User
		Route::get('/registrasi/{id}','UserController@registrasi');
		Route::post('/login', 'UserController@login');
		Route::get('/logout','UserController@logout');
		Route::post('/update/{id}','UserController@update');
		Route::post('/updatepass/{id}', 'UserController@update_password');
		Route::get('/profil', 'UserController@profil');
		Route::get('/detail/pembayaran/{id_notaa}', 'UserController@payment_detail');
		Route::get('/upload/pembayaran/{id}','UserController@payment_upload');
		Route::post('/upload/pembayaran/{id_nota}', 'UserController@payment_process_upload');
		Route::get('/konfirmasi/berhasil', 'UserController@confirmation_done');
		Route::post('/forgot','ForgotController@forgot');
		Route::get('/forgot','ForgotController@forgot_view');
		Route::get('/forgotsend/{email}', 'ForgotController@forgot_send');
		Route::get('/reset', 'ForgotController@reset_view');
		Route::post('/reset', 'ForgotController@reset');
		Route::get('/reset_success', 'ForgotController@reset_success');
		Route::post('/create','UserController@create');
		Route::get('/aktivasi', 'HomeController@aktivasi');
		Route::get('/signin', 'HomeController@signin');

		//WEB
		Route::get('/info','HomeController@info');
		Route::get('/contact_us', 'HomeController@contact_us');


		//Kupon
		Route::get('/category/{cate}' , 'HomeController@category');
		Route::get('/kupon/detail/{id}', 'HomeController@kupon_detail');
		Route::get('/kupon', 'HomeController@kupon');
		Route::post('/search','HomeController@search');



		//transaksi
		Route::post('/chart/pembelian/{id}','ChartController@chart');
		Route::get('/chart/pembelian','ChartController@chartView');
		Route::get('/chart/delete/{id}','ChartController@chartDelete');
		Route::get('/metode_pembayaran','ChartController@payment_method');
		Route::get('/konfirmasi_pembayaran/{total}', 'ChartController@payment_confirmation');
		Route::post('/upload/bukti/trans/{id_nota}', 'ChartController@payment_upload');



		//web_config
		Route::post('/subscribe', 'SubscribeController@subscribe');
		Route::get('/subscribe', 'SubscribeController@subscribe_success');
		Route::get('/unsubscribe/{unsubscribe_token}', 'SubscribeController@unsubscribe');
		Route::get('/unsubscribe', 'SubscribeController@unsubscribe_newsletter');

		

		
		Route::get('/edit/{id}','HomeController@edit');
		Route::get('destroy/{id}','HomeController@destroy');
		//Route::post('/update','HomeController@update');
		Route::post('/submit', 'HomeController@submit');
		Route::resource('books','BookController');
		Route::post('/sendemail', 'EmailController@confirm');