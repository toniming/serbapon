        @extends('web.template')
        @section('navbar')
            @include('web.component.navbar')
        @stop
        @section('content')
        <!-- content -->
        <div class="container">
            <div class="card" style="margin-top:20px">
                <div class="card-block white-text" style="background-color:#808080">
                    <b>Konfirmasi Pembayaran</b>
                </div>
                @foreach ($detail_transaction as $k => $detail_transactions)
                @if($id_notaa == $detail_transactions['id_nota'])
                @foreach ($kupon as $k => $kupons)
                @if($detail_transactions['id_kupon'] == $kupons['_id'])
                <div class="card" style="margin-top:20px; margin-left:30px; width:70%">
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Judul Kupon
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <b>{{ $kupons['title'] }}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Kategori
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <b>{{ $kupons['category'] }}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Lokasi
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <b>{{ $kupons['location'] }}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Masa Berlaku Kupon
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <b>{{ $kupons['start'] }}</b> s/d <b>{{ $kupons['end'] }}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Harga Per Kupon
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <?php
                                                $count= strlen($kupons['price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($kupons['price'],0,$count-3).".".substr($kupons['price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($kupons['price'],0,$count-6).".".substr($kupons['price'],1,3).".".substr($kupons['price'],$count-3,3);
                    ?>
                                            <b>Rp {{ $price2 }}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Quantity
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <b>{{ $detail_transactions['quantity'] }}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Total
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                        <?php
                                                $count= strlen($detail_transactions['sub_price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($detail_transactions['sub_price'],0,$count-3).".".substr($detail_transactions['sub_price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($detail_transactions['sub_price'],0,$count-6).".".substr($detail_transactions['sub_price'],1,3).".".substr($detail_transactions['sub_price'],$count-3,3);
                    ?>
                                            <b>Rp {{ $price2 }}</b> 
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
                @endforeach
                <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            <div class="pull-left">
                                <button onclick="goBackProfil()" class="btn btn-default fa fa-chevron-left" style="height:50px; width:200px">&nbsp Kembali</button>
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