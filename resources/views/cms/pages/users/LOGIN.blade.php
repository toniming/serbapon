@if(!is_null(Session::get('Admin')))
    <script>
        window.location.href = '{{url("/cms")}}'; 
    </script>
@elseif(!is_null(Session::get('Editor')))
    <script>
        window.location.href = '{{url("/cms")}}'; 
    </script>
@endif

@extends('web.template')
@section('content')
@if(Session::has('message-danger'))
    <center><div class="alert alert-danger">{{Session::get('message-danger')}}</div></center>
@endif
<center class="p-t-12"><button type="button" class="btn btn-primary m-r-2" data-toggle="modal" data-target="#exampleModal" data-whatever="ADMIN">ADMIN</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="EDITOR">EDITOR</button></center>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="exampleModalLabel">LOGIN FOR ADMIN</h4></center>
      </div>
      <div class="modal-body">
          <div class="form-group">
                @if(Session::has('message-danger'))
                  <center><div class="alert alert-danger">{{Session::get('message-danger')}}</div></center>
                @endif
                {!! Form::open(['url' => route('cms.loginprocadmin') , 'method' => 'post' ]) !!} 
                <label for="recipient-name" class="control-label"><b>Email</b></label>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => "Email"]) !!}<br>
                <label for="message-text" class="control-label"><b>Password</b></label>
                {!! Form::password('password', ['class' => 'form-control','id' => 'pass', 'placeholder' => 'Password']) !!}
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('LOGIN', ['class' => 'btn btn- blue white-text']) !!}
        {!! Form::close() !!} 
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title" id="exampleModalLabel">LOGIN FOR EDITOR</h4></center>
      </div>
      <div class="modal-body">
          <div class="form-group">
                @if(Session::has('message-danger'))
                  <center><div class="alert alert-danger">{{Session::get('message-danger')}}</div></center>
                @endif
                {!! Form::open(['url' => route('cms.loginproceditor') , 'method' => 'post' ]) !!} 
                <label for="recipient-name" class="control-label"><b>Email</b></label>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => "Email"]) !!}<br>
                <label for="message-text" class="control-label"><b>Password</b></label>
                {!! Form::password('password', ['class' => 'form-control','id' => 'pass', 'placeholder' => 'Password']) !!}
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('LOGIN', ['class' => 'btn btn- blue white-text']) !!}
        {!! Form::close() !!} 
      </div>
    </div>
  </div>
</div>
@stop