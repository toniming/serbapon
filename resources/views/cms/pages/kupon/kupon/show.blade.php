@extends('cms.pages.kupon.template')
@section('page_content')

<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_control', ['component' => [
		'title'			=> 'Detail kupon',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('cms.kupon.kupon.index')
												],
								'edit'		=>	[
													'link'	=> route('cms.kupon.kupon.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('cms.kupon.kupon.destroy', ['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('cms.widgets.alertbox')
	<div class="card-block">
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon Title',
			'content'	=>  ucfirst($page_datas->datas['title'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon Slug',
			'content'	=>  ucfirst($page_datas->datas['slug'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon Description',
			'content'	=>  ucfirst($page_datas->datas['description'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon Tags',
			'content'	=>  ucfirst($page_datas->datas['tags'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon Type',
			'content'	=>  ucfirst($page_datas->datas['type'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Extra Fields',
			'content'	=>  ucfirst($page_datas->datas['extra_fields'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Users',
			'content'	=>  ucfirst($page_datas->datas['users'])
		]])
		@include('cms.widgets.components.detail.detail-date',['component' => [
			'title'		=> 'Publish Time',
			'content'	=>  $page_datas->datas['published_at']
		]])			
		@include('cms.widgets.components.detail.detail-date',['component' => [
			'title'		=> 'Last Time Update',
			'content'	=>  $page_datas->datas['updated_at']
		]])			
		@include('cms.widgets.components.detail.detail-date',['component' => [
			'title'		=> 'Create Time',
			'content'	=>  $page_datas->datas['created_at']
		]])			
	</div>
</div>
@stop