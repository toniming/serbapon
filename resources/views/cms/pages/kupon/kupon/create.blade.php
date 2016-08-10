@extends('cms.pages.kupon.template')
@section('page_content')

@if(is_null($page_datas->id))
	{!! Form::open(['url' => route('cms.kupon.kupon.store'), 'method' => 'post' ]) !!}
@else
	{!! Form::open(['url' => route('cms.kupon.kupon.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
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
				<label for="name">Slug</label>
				{!! Form::text('slug', $page_datas->datas['slug'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Description</label>
				{!! Form::textarea('description', $page_datas->datas['description'], ['class' => 'form-control', 'rows' => '5']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Images</label>
				{!! Form::text('images', $page_datas->datas['image'], ['class' => 'form-control']) !!}
			</fieldset>		
			<fieldset class="form-group">
				<label for="name">Tags</label>
				{!! Form::text('tags', $page_datas->datas['tags'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Type</label>
				{!! Form::text('type', $page_datas->datas['type'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Extra Fields</label>
				{!! Form::text('extra_fields', $page_datas->datas['extra_fields'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">User</label>
				{!! Form::text('users', $page_datas->datas['users'], ['class' => 'form-control']) !!}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop