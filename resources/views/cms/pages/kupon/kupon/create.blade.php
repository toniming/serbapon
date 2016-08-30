@extends('cms.pages.kupon.template')
@section('page_content')

@if(is_null($page_datas->id))
	{!! Form::open(['url' => route('cms.kupon.kupon.store'), 'method' => 'post','files' => true ]) !!}
@else
	{!! Form::open(['url' => route('cms.kupon.kupon.update', ['id' => $page_datas->id]), 'method' => 'patch','files' => true ]) !!}
@endif
	<div class="card">
		@include('cms.widgets.alertbox')
		<div class="card-block">
			@include('cms.widgets.components.title.title_control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('cms.kupon.kupon.index')
														],
										'save'		=> 	[
															'link'	=> route('cms.kupon.kupon.store')
														]
									]
			]])

			
			<fieldset class="form-group">
				<label for="name">Title</label>
				{!! Form::text('title', $page_datas->datas['title'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Images</label><br>
				{!! Html::image('images/'.$page_datas->datas['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'height:200px; width:200px']) !!}<br>
				{!! Form::file('images', $page_datas->datas['images'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Category</label><br>
				<select name="category" class="form-control w-90">
	  				<option value="Food"<?php if($page_datas->datas['category'] == 'Food') echo "selected";?>>Food</option>
	  				<option value="Travel"<?php if($page_datas->datas['category'] == 'Travel') echo "selected";?>>Travel</option>
	  				<option value="Vacation"<?php if($page_datas->datas['category'] == 'Vacation') echo "selected";?>>Vacation</option>
	  				<option value="Service"<?php if($page_datas->datas['category'] == 'Service') echo "selected";?>>Service</option>
	  			</select>
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Location</label>
				{!! Form::text('location', $page_datas->datas['location'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Description</label>
				{!! Form::textarea('description', $page_datas->datas['description'], ['class' => 'form-control', 'rows' => '5', 'id' => 'myTextarea']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Start Date</label>
				{!! Form::date('start', $page_datas->datas['start'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">End Date</label>
				{!! Form::date('end', $page_datas->datas['end'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Sell</label>
				{!! Form::text('sell', $page_datas->datas['sell'], ['class' => 'form-control']) !!}
			</fieldset>	
			<fieldset class="form-group">
				<label for="name">Old-Price</label>
				{!! Form::text('old_price', $page_datas->datas['old_price'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Price</label>
				{!! Form::text('price', $page_datas->datas['price'], ['class' => 'form-control']) !!}
			</fieldset>
		</div>
	</div>
	
{!! Form::close() !!}
@stop