@extends('cms.pages.transaction.template')
@section('page_content')

<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_control', ['component' => [
		'title'			=> 'Detail transaction',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('cms.transaction.transaction.index')
												],
								'konfirmasi'=>	[
													'link'	=> route('transaction.confirmation', ['id'=> $page_datas->id] )
												],		
							]		
	]])
	</div>
	@include('cms.widgets.alertbox')
	@forelse ($page_datas->users as $keys => $user)
	@if($page_datas->datas['id_user'] == $user['_id'])
	<div class="card-block">
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Email User',
			'content'	=>  $user['email']
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Bukti Trans',
			'content'	=> ''
		]])
		{!! Html::image('images/'.$page_datas->datas['images'], null, ['class' => 'card-img-top img-fluid', 'style' => 'height:400px; width:400px']) !!}<br>
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'ID Nota',
			'content'	=>  ucfirst($page_datas->datas['id_notaa'])
		]])
		<?php
												$count= strlen(ucfirst($page_datas->datas['sum_price']));
												$price = 0;
												if($count<=6){
													$price = substr(ucfirst($page_datas->datas['sum_price']),0,$count-3).".".substr(ucfirst($page_datas->datas['sum_price']),$count-3,3);
												}
												else if ($count==7){
													$price = substr(ucfirst($page_datas->datas['sum_price']),0,$count-6).".".substr(ucfirst($page_datas->datas['sum_price']),1,3).".".substr(ucfirst($page_datas->datas['sum_price']),$count-3,3);
												}
												$pricee = "Rp ".$price

											?>
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Price Total',
			'content'	=>  $pricee
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Buying Date',
			'content'	=>  ucfirst($page_datas->datas['date_buy'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Status',
			'content'	=>  ucfirst($page_datas->datas['status'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Destination Bank',
			'content'	=>  ucfirst($page_datas->datas['desti_bank'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'From Bank',
			'content'	=>  ucfirst($page_datas->datas['bank'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Name of Send',
			'content'	=>  ucfirst($page_datas->datas['name_send'])
		]])	
	</div>
	@endif
	@empty	
	@endforelse	
</div>
@stop