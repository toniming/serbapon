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
                            <center>
                                <h4><b>Password anda akan segera kami reset</b></h4>
                                <hr><div style="font-size:15px">
                                Sebuah email akan dikirimkan ke email anda,<br><br>
                                <b>{{$email}}</b><br><br>
                                email ini akan menjelaskan bagaimana anda mendapatkan password baru.<br>

                                Silahkan tunggu, karena pengiriman email akan memakan beberapa waktu.<br>
                                ingat untuk mengkonfirmasi email yang telah dikirimkan,<br>
                                dan periksa email folder spam anda jika anda tidak menerima email.<br></div>
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