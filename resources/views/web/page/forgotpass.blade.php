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
                            <center>{!! Form::open(array('url' => '/forgot', 'class' => 'form-inline')) !!}
                                <h5><b>Bermasalah dengan akun anda?</b></h5>
                                Masukkan email anda di bawah ini. kami akan kirimkan link reset password ke email anda<br>
                                <hr>
                                <center>Email : {!! Form::text('email', null, ['class' => 'form-control','style' => 'width:230px']) !!}</center>
                                <hr>
                                {!! Form::submit('Reset Password', ['class' => 'btn green white-text','style' => 'width:300px']) !!}
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