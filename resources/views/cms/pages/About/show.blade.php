@extends('cms.pages.about.template')
@section('page_content')

<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_control', ['component' => [
		'title'			=> 'Detail About',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('cms.about.about.index')
												],
								'edit'		=>	[
													'link'	=> route('cms.about.about.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('cms.about.about.destroy', ['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('cms.widgets.alertbox')
	<div class="card-block">
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Description About',
			'content'	=>  ucfirst($page_datas->datas['content']['About'])
		]])		
	</div>
</div>
@stop