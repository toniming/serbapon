@extends('cms.pages.Contact.template')
@section('page_content')

@if(is_null($page_datas->id))
	{!! Form::open(['url' => route('cms.contact.contact.store'), 'method' => 'post' ]) !!}
@else
	{!! Form::open(['url' => route('cms.contact.contact.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('cms.widgets.alertbox')
		<div class="card-block">
			@include('cms.widgets.components.title.title_control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('cms.contact.contact.index')
														],
										'save'		=> 	[
															'link'	=> route('cms.contact.contact.store')
														]
									]
			]])

			
			<fieldset class="form-group">
				<label for="name">Pertanyaan</label>
				{!! Form::textarea('contact', $page_datas->datas['content']['contact'], ['class' => 'form-control', 'rows' => '5', 'id' => 'myTextarea']) !!}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop