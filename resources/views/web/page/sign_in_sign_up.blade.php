@if(!is_null(Session::get('User')))
    <script>
        window.location.href = '{{url("/")}}'; 
    </script>
@endif
        @extends('web.template')
        @section('content')
        <!-- content -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 p-y-2">
                    <center><a href="/">{!! Html::image('images/serbapon-footer.png', null, ['class' => 'img-fluid'] ) !!}</a></center>
                </div>
            </div>
        </div>
        
        
        <div class="container-fluid m-b-3">
            <div class="row">        
                <div class="col-md-1 col-lg-1">&nbsp;</div>
                <div class="col-md-10 col-lg-10">
                    <div class="col-md-6 col-lg-6 p-x-3">
                        <h6>Jika sudah mempunyai akun silahkan login di bawah ini</h6><br>
                        <div class="card p-a-2 bg-faded">
                            <center><h5><b>LOGIN USER</b></h5></center>
                                {!! Form::open(array('url' => '/login')) !!}
                                    @if(Session::has('message-danger'))
                                        <center><div class="alert alert-danger">{{Session::get('message-danger')}}</div></center>
                                    @endif
                                    @if(Session::has('message-success'))
                                        <center><div class="alert alert-success">{{Session::get('message-success')}}</div></center>
                                    @endif      
                                        <label>Email:</label>
                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => "email"]) !!}
                                        <label>Password:</label>
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                                        <a href="/forgot">Lupa Password?</a><br><br>
                                        {!! Form::submit('LOGIN', ['class' => 'btn btn-block green white-text']) !!}
                                {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 border-left-card p-x-3">
                    
                        <h6>Jika sudah mempunyai akun silahkan login di bawah ini</h6><br>
                        <div class="card p-a-2 bg-faded">
                            <center><h5><b>DAFTAR USER BARU</b></h5></center>
                                {!! Form::open(array('url' => '/create')) !!}
                                    @if(Session::has('message-danger2'))
                                        <center><div class="alert alert-danger">{{Session::get('message-danger2')}}</div></center>
                                    @endif
                                    @if(Session::has('non_akun'))
                                        <center><div class="alert alert-danger">{{Session::get('non_akun')}}</div></center>
                                    @endif
                                    <input type="hidden" name="id">
                                    <label>Nama Lengkap:</label>
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap']) !!}
                                    <label>Email:</label>
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                    <label>Password:</label>
                                    {!! Form::password('password', ['class' => 'form-control','id' => 'password', 'placeholder' => 'Password']) !!}
                                    <label>Re-enter Password:</label>
                                    {!! Form::password('konfirmasi-password', ['class' => 'form-control', 'id' => 'password2', 'placeholder' => 'Konfirmasi Password']) !!}
                                    <label>Tanggal Lahir:</label>
                                    {!! Form::date('dob', null, ['class' => 'form-control','placeholder' => 'Tanggal Lahir']) !!}
                                    <label>Jenis Kelamin:</label>
                                    {!! Form::radio('sex', 'Man', ['class' => 'form-control']) !!} Pria
                                    {!! Form::radio('sex', 'Woman', ['class' => 'form-control']) !!} Wanita<br>
                                    <small>
                                    <input type="checkbox" name="test" required>
                                    Dengan ini saya menyetujui <a href="#">Syarat dan Ketentuan</a> adapromo untuk mendaftar akun<br><br>
                                    </small>
                                    {!! Form::submit('Daftar Baru', ['class' => 'btn btn-block green white-text', 'id' => 'btnsubmit']) !!}
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 col-lg-1">&nbsp;</div>
            </div>
        </div>
        <!-- container -->
        <!-- end content -->
        @stop
        @section('simple-footer')
            @include('web.component.simple_footer')
        @stop