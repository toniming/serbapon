@extends('cms.pages.FAQ.template')
@section('page_content')

<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_control', ['component' => [
		'title'			=> 'Detail FAQ',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('cms.FAQ.FAQ.index')
												],
								'edit'		=>	[
													'link'	=> route('cms.FAQ.FAQ.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('cms.FAQ.FAQ.destroy', ['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('cms.widgets.alertbox')
	<div class="card-block">
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Pertanyaan',
			'content'	=>  ucfirst($page_datas->datas['content']['pertanyaan'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Jawaban',
			'content'	=>  ucfirst($page_datas->datas['content']['jawaban'])
		]])			
	</div>
</div>
@stop