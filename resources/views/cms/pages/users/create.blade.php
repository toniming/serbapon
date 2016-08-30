@extends('cms.pages.users.template')
@section('page_content')

@if(is_null($page_datas->id))
	{!! Form::open(['url' => route('cms.user.user.store'), 'method' => 'post' ]) !!}
@else
	{!! Form::open(['url' => route('cms.user.user.update', ['id' => $page_datas->id]), 'method' => 'patch' ]) !!}
@endif
	<div class="card">
		@include('cms.widgets.alertbox')
		<div class="card-block">
			@include('cms.widgets.components.title.title_control', ['component' => [
				'title'			=> $page_attributes->page_title,
				'controls'		=> 	[
										'back'		=>	[
															'link'	=> route('cms.user.user.index')
														],
										'save'		=> 	[
															'link'	=> route('cms.user.user.store')
														]
									]
			]])

			
			<fieldset class="form-group">
				<label for="name">Name</label>
				{!! Form::text('name', $page_datas->datas['name'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Email</label>
				{!! Form::text('email', $page_datas->datas['email'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Password</label>
				{!! Form::password('password', ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Re-enter Password</label>
				{!! Form::password('password', ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Date of birth</label>
				{!! Form::date('dob', $page_datas->datas['dob'], ['class' => 'form-control']) !!}
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Role</label><br>
				<input type="radio" value="Admin" name="role"<?php if($page_datas->datas['role'] == 'Admin') echo "checked='checked'";?>>Admin &nbsp
				<input type="radio" value="Editor" name="role"<?php if($page_datas->datas['role'] == 'Editor') echo "checked='checked'";?>>Editor &nbsp
				<input type="radio" value="User" name="role"<?php if($page_datas->datas['role'] == 'User') echo "checked='checked'";?>>User<br>
				<!--{!! Form::radio('role', 'Admin' , ['class' => 'form-control']) !!} Admin &nbsp
				{!! Form::radio('role', 'Editor' , ['class' => 'form-control']) !!} Editor &nbsp
                {!! Form::radio('role', 'User' , ['class' => 'form-control']) !!} User<br>-->
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Role</label><br>
				<input type="radio" value="Aktif" name="status"<?php if($page_datas->datas['status'] == 'Aktif') echo "checked='checked'";?>>Aktif &nbsp
				<input type="radio" value="Belum_Aktif" name="status"<?php if($page_datas->datas['status'] == 'Belum_Aktif') echo "checked='checked'";?>>Belum_Aktif &nbsp
				<!--{!! Form::radio('status', 'Aktif' , ['class' => 'form-control']) !!} Aktif &nbsp
				{!! Form::radio('status', 'Belum_Aktif' , ['class' => 'form-control']) !!} Belum_Aktif &nbsp-->
			</fieldset>
			<fieldset class="form-group">
				<label for="name">Sex</label> <br>
				<input type="radio" value="Man" name="sex"<?php if($page_datas->datas['sex'] == 'Man') echo "checked='checked'";?>>Man &nbsp
				<input type="radio" value="Woman" name="sex"<?php if($page_datas->datas['sex'] == 'Woman') echo "checked='checked'";?>>Woman &nbsp
				<!--{!! Form::radio('sex', 'Man' , ['class' => 'form-control']) !!} Man &nbsp
                {!! Form::radio('sex', 'Woman' , ['class' => 'form-control']) !!} Woman<br>-->
			</fieldset>
		</div>
	</div>
{!! Form::close() !!}
@stop