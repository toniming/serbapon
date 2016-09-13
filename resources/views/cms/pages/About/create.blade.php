@extends('cms.pages.About.template')
@section('page_content')

@if(is_null($page_datas->id))
	{!! Form::open(['url' => route('cms.about.about.store'), 'method' => 'post' ]) !!}
@else
	{!! Form::open(['url' => route('cms.about.about.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('cms.widgets.alertbox')
		<div class="card-block">
			@include('cms.widgets.components.title.title_control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('cms.about.about.index')
														],
										'save'		=> 	[
															'link'	=> route('cms.about.about.store')
														]
									]
			]])

			
			<fieldset class="form-group">
				<label for="name">About</label>
				{!! Form::textarea('about', $page_datas->datas['content']['About'], ['class' => 'form-control', 'rows' => '5', 'id' => 'myTextarea']) !!}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop