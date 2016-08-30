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
		{!! Html::image('images/'.$page_datas->datas['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'height:200px; width:200px']) !!}
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Image',
			'content'	=>  ucfirst($page_datas->datas['images']['originalName'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Category',
			'content'	=>  ucfirst($page_datas->datas['category'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Location',
			'content'	=>  ucfirst($page_datas->datas['location'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon Description',
			'content'	=>  ucfirst($page_datas->datas['description'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Start Date',
			'content'	=>  ucfirst($page_datas->datas['start'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'End date',
			'content'	=>  ucfirst($page_datas->datas['end'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon sell',
			'content'	=>  ucfirst($page_datas->datas['sell'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon old_price',
			'content'	=>  ucfirst($page_datas->datas['old_price'])
		]])
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'kupon price',
			'content'	=>  ucfirst($page_datas->datas['price'])
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