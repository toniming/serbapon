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
                                Transaksi Anda sudah terkonfirmasi<br>
                                kupon telah dikirimkan ke email anda<br>
                                silahkan cek email anda<br>
                                <a href="/profil"> <i class="fa fa-long-arrow-left" aria-hidden="true"> Kembali</i> </a>
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