        @extends('web.template')
        @section('navbar')
            @include('web.component.navbar')
        @stop
        @section('content')
        <!-- content -->
        <div class="container">
            <div class="card" style="margin-top:20px">
                <div class="card-block white-text" style="background-color:#808080">
                    <b>Pembayaran</b>
                </div>

                <div class="card-block">
                    Lakukan pembayaran dengan mentransfer ke rek<br>
                    BCA 726-1897-981 Serbapon.id<br>
                    MANDIRI 1726-91729-22 Serbapon.id<br>
                    BNI 7261918-8819 Serbapon.id<br>
                    dengan memberikan kode transaksi <b style="font-size:20px">{{Session::get('id_nota')}}</b><br>
                </div>

                <div class="card-block" style="background-color:#ccc">
                    <div class="col-md-3 col-lg-3 black-text">
                        <h5><b>Detail Pembelian</b></h5>
                    </div>
                </div>
                <?php $total = 0; ?>
                @foreach ($kupon as $k => $kupons)
                @if(Session('id') == $kupons['id_user'])
                <div class="card-block" style="background-color:#ccc">
                    <div class="col-md-5 col-lg-5 black-text">
                        {{ $kupons['title'] }} <br>
                    </div>
                    <div class="col-md-1 col-lg-1 black-text">
                        <b>{{ $kupons['quantity' ]}}</b><br>
                    </div>
                    <div class="col-md-2 col-lg-2 black-text">
                    <?php
                                                $count= strlen($kupons['sub_price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($kupons['sub_price'],0,$count-3).".".substr($kupons['sub_price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($kupons['sub_price'],0,$count-6).".".substr($kupons['sub_price'],1,3).".".substr($kupons['sub_price'],$count-3,3);
                    ?>
                                            Rp {{ $price2 }}
                    </div>

                    <div class="col-md-4 col-lg-4"><b style="font-size:20px">
                        <a class="cart_quantity_delete  pull-right" href="/chart/delete/{{ $kupons['_id'] }} "><i class="fa fa-trash"></i></a></b>
                    </div>
                </div>
                <?php 
                    $total += $kupons['sub_price'];
                ?>
                @endif
                @endforeach

                <div class="card-block" style="background-color:#ccc">
                    <div class="col-md-5 col-lg-5 black-text">
                        <h5><b>Total Pembayaran :</b><h5>
                    </div>
                    <div class="col-md-1 col-lg-1 black-text">
                        <b style="font-size:20px">=</b><br>
                    </div>
                    <div class="col-md-2 col-lg-2"><b style="font-size:20px">
                    <?php
                                                $count= strlen($total);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($total,0,$count-3).".".substr($total,$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($total,0,$count-6).".".substr($total,1,3).".".substr($total,$count-3,3);
                    ?>
                                            Rp {{ $price2 }}
                    </b></div>
                </div>
            </div>
            <button onclick="goBack()" class="btn btn-default fa fa-chevron-left" style="height:50px; width:200px">&nbsp Belanja Lagi</button>
            <div class="pull-right">
                <a href="/konfirmasi_pembayaran/{{$total}}" class="btn btn-block btn-success" style="height:60px; width:300px; padding-top:20px"><b>Check Out</b></a><br>
            </div>
        </div>
        <!-- end content -->
        @stop
        @section('footer')
            @include('web.component.footer')
        @stop