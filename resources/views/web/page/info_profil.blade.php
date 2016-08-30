@extends('web.template')
@section('navbar')
	@include('web.component.navbar')
@stop
@section('content')
	<!-- content -->
	<div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12  m-b-3">
                    <div class="col-md-2 col-lg-2"></div>
                    <div class="col-md-8 col-lg-8">
                        	<div class="m-t-3 p-a-2" id="tabs">
                        	@if(Session::has('message-danger'))
								<center><div class="alert alert-danger">{{Session::get('message-danger')}}</div></center>
							@endif
							@if(Session::has('message-success'))
								<center><div class="alert alert-success">{{Session::get('message-success')}}</div></center>
							@endif
								<ul>
									<li><a href="#profil"><strong><i class="fa fa-user">&nbsp</i>Data Profil</strong></a></li>
									<li><a href="#Ubah_password"><strong><i class="fa fa-key">&nbsp</i>Ubah Password</strong></a></li>
								</ul>
								<div id="profil">
									{!! Form::open(array('url' => '/update/'.$user['_id'])) !!}

									<table  style="font-size:14px">
										<tr>
										    <th rowspan="9">{!! Html::image('images/jadi2.jpg', null, ['class' => 'img-fluid', 'style' => 'width:180px; height:200px; margin-left:30px']) !!}</th>
										  </tr>
										  <tr>
										    <td> </td>
										    <td><b> Nama</td>
										    <td>:</b></td>
										    <td> {!! Form::text('name', $user['name'], ['class' => 'form-control']) !!}</td>
										  </tr>
										  <tr>
										    <td> </td>
										    <td><b> Email</td>
										    <td>:</b></td>
										    <td>{!! Form::text('email', $user['email'], ['class' => 'form-control']) !!}</td>
										  </tr>
										  <tr>
										    <td> &nbsp &nbsp &nbsp</td>
										    <td><b> Tanggal Lahir</td>
										    <td>:</b></td>
										    <td>{!! Form::date('dob', $user['dob'], ['class' => 'form-control']) !!}</td>
										  </tr>
										  <tr>
										    <td> &nbsp &nbsp &nbsp</td>
										    <td><b> Jenis Kelamin</td>
										    <td>:</b></td>
										    <td>&nbsp
										    <input type="radio" value="Man" name="sex"<?php if($user['sex'] == 'Man') echo "checked='checked'";?>>Man &nbsp
											<input type="radio" value="Woman" name="sex"<?php if($user['sex'] == 'Woman') echo "checked='checked'";?>>Woman &nbsp</td>
										  </tr>
										  <tr>
										    <td> &nbsp</td>
										    <td> </td>
										    <td> </td>
										  </tr>
										  <tr>
										    <td> &nbsp</td>
										    <td> </td>
										    <td> </td>
										    <td>{!! Form::submit('Simpan', ['class' => 'btn green white-text','style' => 'width:100px; float:right']) !!}</td>
										  </tr>

									</table>

									{!! Form::close() !!}
								</div>
								<div id="Ubah_password">
									<table  style="font-size:14px; margin-left:10px; margin-top:20px">
									{!! Form::open(array('url' => '/updatepass/'.$user['_id'])) !!}
										  <tr>
										    <td> </td>
										    <td><b>Password Lama</td>
										    <td>:</b></td>
										    <td>{!! Form::password('password_lama', ['class' => 'form-control']) !!}</td>
										  </tr>
										  <tr>
										    <td> &nbsp &nbsp &nbsp</td>
										    <td><b>Password baru</td>
										    <td>:</b></td>
										    <td>{!! Form::password('password', ['class' => 'form-control','id' => 'password', 'style' => 'margin:10px 0']) !!}</td>
										  </tr>
										  <tr>
										    <td> &nbsp &nbsp &nbsp</td>
										    <td><b>Konfirmasi Password</td>
										    <td>:</b></td>
										    <td>{!! Form::password('konfirmasi_password', ['class' => 'form-control', 'style' => 'width:350px','id' => 'password2']) !!}</td>
										    <td></td>
										  </tr>
										  <tr>
										    <td> &nbsp</td>
										    <td> </td>
										    <td> </td>
										    <td> </td>
										  </tr>
										  <tr>
										    <td> &nbsp</td>
										    <td> </td>
										    <td> </td>
										    <td>{!! Form::submit('Simpan', ['class' => 'btn green white-text','style' => 'width:100px; float:right','id' => 'btnsubmit']) !!}</td>
										  </tr>

									{!! Form::close() !!}
									</table>

								</div>
							</div>
                    </div>
            	</div>
    		</div>
    </div>		
	<!-- end content -->
@stop
@section('footer')
	@include('web.component.footer')
@stop