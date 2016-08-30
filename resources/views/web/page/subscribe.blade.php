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
                                <h4><b>Selamat anda berhasil subscribe di Serbapon.id<br>
                                Informasi tentang kupon terbaru akan kami kirim ke email anda.<br>
                                Silahkan cek email anda.</b></h4>
                                <h5><b>Klik <a href="{{ url('/')}}">Disini</a> untuk kembali ke halaman awal</b></h5>
                                <div style="clear:both;"></div>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2"></div>
                </div>        
            </div>
        </div>
        <!-- end content -->
        @stop
        @section('simple-footer')
            @include('web.component.simple_footer')
        @stop