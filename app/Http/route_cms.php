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
});