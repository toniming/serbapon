@extends('cms.pages.Contact.template')
@section('page_content')

<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_control', ['component' => [
		'title'			=> 'Detail Contact',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('cms.contact.contact.index')
												],
								'edit'		=>	[
													'link'	=> route('cms.contact.contact.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('cms.contact.contact.destroy', ['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('cms.widgets.alertbox')
	<div class="card-block">
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Contact',
			'content'	=>  ucfirst($page_datas->datas['content']['contact'])
		]])			
	</div>
</div>
@stop