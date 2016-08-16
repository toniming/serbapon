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
				<label for="name">Images</label>
				{!! Form::file('images',$page_datas->datas['images'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Description</label>
				{!! Form::textarea('description', $page_datas->datas['description'], ['class' => 'form-control', 'rows' => '5']) !!}
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