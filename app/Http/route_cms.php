<?php


Route::group(['namespace' => 'Cms\\', 'prefix' => 'cms'], function(){
	Route::get('/',			['uses' => 'DashboardController@home',	'as' => 'cms.home']);
	Route::get('/website', 		['uses' => 'DashboardController@website', 'as' => 'cms.website']);
	Route::resource('/kupon/kupon', 'KuponController', ['names' => [
			'index' 	=> 'cms.kupon.kupon.index',
			'create'	=> 'cms.kupon.kupon.create', 
			'store' 	=> 'cms.kupon.kupon.store', 
			'show' 		=> 'cms.kupon.kupon.show', 
			'edit' 		=> 'cms.kupon.kupon.edit', 
			'update' 	=> 'cms.kupon.kupon.update', 
			'destroy' 	=> 'cms.kupon.kupon.destroy'
	]]);
	Route::post('/kupon/kupon/search', ['uses' => 'KuponController@search', 'as' => 'cms.kupon.search']);

	Route::resource('/user/user', 'UserController', ['names' => [
			'index' 	=> 'cms.user.user.index',
			'create'	=> 'cms.user.user.create', 
			'store' 	=> 'cms.user.user.store', 
			'show' 		=> 'cms.user.user.show', 
			'edit' 		=> 'cms.user.user.edit', 
			'update' 	=> 'cms.user.user.update', 
			'destroy' 	=> 'cms.user.user.destroy'
	]]);
	Route::post('/user/user/search', ['uses' => 'UserController@search', 'as' => 'cms.user.search']);

	Route::get('/login',			['uses' => 'UserController@login',	'as' => 'cms.login']);
	Route::post('/loginprocadmin', 		['uses' => 'UserController@loginProcAdmin', 'as' => 'cms.loginprocadmin']);
	Route::post('/loginproceditor', 		['uses' => 'UserController@loginProcEditor', 'as' => 'cms.loginproceditor']);
	Route::get('/logoutcms', 		['uses' => 'UserController@logout', 'as' => 'cms.logoutcms']);
	Route::resource('/FAQ/FAQ', 'FAQController', ['names' => [
			'index' 	=> 'cms.FAQ.FAQ.index',
			'create'	=> 'cms.FAQ.FAQ.create', 
			'store' 	=> 'cms.FAQ.FAQ.store', 
			'show' 		=> 'cms.FAQ.FAQ.show', 
			'edit' 		=> 'cms.FAQ.FAQ.edit', 
			'update' 	=> 'cms.FAQ.FAQ.update', 
			'destroy' 	=> 'cms.FAQ.FAQ.destroy'
	]]);

	Route::resource('/transaction/transaction', 'TransactionController', ['names' => [
			'index' 	=> 'cms.transaction.transaction.index',
			'create'	=> 'cms.transaction.transaction.create', 
			'store' 	=> 'cms.transaction.transaction.store', 
			'show' 		=> 'cms.transaction.transaction.show', 
			'edit' 		=> 'cms.transaction.transaction.edit', 
			'update' 	=> 'cms.transaction.transaction.update', 
			'destroy' 	=> 'cms.transaction.transaction.destroy',
			'confirmation' 	=> 'cms.transaction.transaction.confirmation'
	]]);
	Route::post('/transaction/transaction/search', ['uses' => 'TransactionController@search', 'as' => 'cms.transaction.search']);


	Route::get('/cms/transaction/transaction/{id}', 		['uses' => 'TransactionController@confirmation', 'as' => 'transaction.confirmation']);
	Route::get('/cms/transaction/transaction/showDetail/{id_nota}', 		['uses' => 'TransactionController@showdetail', 'as' => 'transaction.detail']);
});