@extends('cms.pages.FAQ.template')
@section('page_content')

@if(is_null($page_datas->id))
	{!! Form::open(['url' => route('cms.FAQ.FAQ.store'), 'method' => 'post' ]) !!}
@else
	{!! Form::open(['url' => route('cms.FAQ.FAQ.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('cms.widgets.alertbox')
		<div class="card-block">
			@include('cms.widgets.components.title.title_control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('cms.FAQ.FAQ.index')
														],
										'save'		=> 	[
															'link'	=> route('cms.FAQ.FAQ.store')
														]
									]
			]])

			
			<fieldset class="form-group">
				<label for="name">Pertanyaan</label>
				{!! Form::text('pertanyaan', $page_datas->datas['content']['pertanyaan'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Jawaban</label>
				{!! Form::text('jawaban', $page_datas->datas['content']['jawaban'], ['class' => 'form-control']) !!}
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop