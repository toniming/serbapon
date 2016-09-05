@extends('cms.pages.transaction.template')
@section('page_content')

<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_control', ['component' => [
		'title'			=> 'Detail FAQ',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('cms.transaction.transaction.index')
												],
							]		
	]])
	</div>
	@include('cms.widgets.alertbox')

	@foreach ($detail_transaction as $k => $detail_transactions)
    @if($id_nota == $detail_transactions['id_nota'])
    @foreach ($kupon as $k => $kupons)
    @if($detail_transactions['id_kupon'] == $kupons['_id'])
	<div class="card-block">
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Nama Kupon',
			'content'	=>  $kupons['title']
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Kategori',
			'content'	=>  $kupons['category']
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'lokasi',
			'content'	=>  $kupons['location']
		]])

		<?php 
			$apply		= $kupons['start']." s/d ".$kupons['end']
		?>

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'apply date',
			'content'	=>  $apply
		]])

		<?php
												$count= strlen($kupons['price']);
												$price = 0;
												if($count<=6){
													$price = substr($kupons['price'],0,$count-3).".".substr($kupons['price'],$count-3,3);
												}
												else if ($count==7){
													$price = substr($kupons['price'],0,$count-6).".".substr($kupons['price'],1,3).".".substr($kupons['price'],$count-3,3);
												}
												$pricee = "Rp ".$price

		?>

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Price Total',
			'content'	=>  $pricee
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'quantity',
			'content'	=>  $detail_transactions['quantity']
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'sum price',
			'content'	=>  $detail_transactions['sub_price']
		]])
	</div>
	<hr style="border-bottom:2px solid black">
	@endif
    @endforeach
    @endif
    @endforeach
</div>
@stop