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
                <div class="col-md-12 col-lg-12 p-t-1">
                    <center>{!! Html::image('images/serbapon-footer.png', null, ['class' => 'img-fluid'] ) !!}</center>
                </div>
            </div>
        </div>
        
        
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12  m-b-3">
                    <div class="col-md-2 col-lg-2"></div>
                    <div class="col-md-8 col-lg-8">
                        <div class="card m-t-3 p-a-2">
                            <center>
                                <h5><b>Silahkan Masukkan Password Baru Anda</b></h5>
                                <hr>
                                <br>
                                {!! Form::open(array('url' => '/reset', 'class' => 'form-inline')) !!}
                                <div class="col-md-4" style="text-align:left;">Email</div>
                                {!! Form::text('email', null, ['class' => 'form-control','style' => 'width:60%']) !!}<br><br>
                                <div class="col-md-4" style="text-align:left;">New Password</div>
                                {!! Form::password('password', ['class' => 'form-control','style' => 'width:60%']) !!}<br><br>
                                <div class="col-md-4" style="text-align:left;">Confirm Password</div>
                                {!! Form::password('password_confirm', ['class' => 'form-control','style' => 'width:60%']) !!}
                                <hr>
                                {!! Form::submit('Ubah Password', ['class' => 'btn green white-text','style' => 'width:300px']) !!}
                                {!! Form::close() !!}
                                <div style="clear:both;"></div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2"></div>
                </div>        
            </div>
        </div>
        <!-- container -->
        <!-- end content -->
        @stop
        @section('simple-footer')
            @include('web.component.simple_footer')
        @stop