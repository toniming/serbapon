@extends('cms.pages.users.template')
@section('page_content')

<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_control', ['component' => [
		'title'			=> 'Detail user',
		'controls'		=> 	[
								'back'		=>	[
													'link'	=> route('cms.user.user.index')
												],
								'edit'		=>	[
													'link'	=> route('cms.user.user.edit', ['id'=> $page_datas->id] )
												],												
								'delete'	=> 	[
													'link'	=> route('cms.user.user.destroy', ['id' => $page_datas->id] )
												],
							]		
	]])
	</div>
	@include('cms.widgets.alertbox')
	<div class="card-block">
		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Name',
			'content'	=>  ucfirst($page_datas->datas['_id'])
		]])

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Email',
			'content'	=>  ucfirst($page_datas->datas['email'])
		]])

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Password',
			'content'	=>  ucfirst($page_datas->datas['password'])
		]])

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Date of Birth',
			'content'	=>  ucfirst($page_datas->datas['dob'])
		]])

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'role',
			'content'	=>  ucfirst($page_datas->datas['role'])
		]])

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Status',
			'content'	=>  ucfirst($page_datas->datas['status'])
		]])

		@include('cms.widgets.components.detail.detail-text',['component' => [
			'title'		=> 'Sex',
			'content'	=>  ucfirst($page_datas->datas['sex'])
		]])

	</div>
</div>
@stop