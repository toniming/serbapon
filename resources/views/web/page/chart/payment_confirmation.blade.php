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
                @foreach ($transaction1 as $k => $transactions)
                @if($id_trans == $transactions['_id'])
                {!! Form::open(['url' => '/upload/bukti/trans/'.$transactions['id_notaa'], 'method' => 'post','files' => true ]) !!}
                <div class="card" style="margin-top:20px; margin-left:30px; width:70%">
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Kode Pembayaran
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <b>{{ $transactions['id_notaa']}}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Total Pembayaran
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <b><?php
                                                $count= strlen($transactions['sum_price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($transactions['sum_price'],0,$count-3).".".substr($transactions['sum_price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($transactions['sum_price'],0,$count-6).".".substr($transactions['sum_price'],1,3).".".substr($transactions['sum_price'],$count-3,3);
                    ?>
                                            Rp {{ $price2 }}</b>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Tujuan Transfer
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            <select name="desti_bank" class="form-control w-90">
                                <option value="bca">BCA, Sebapon.id, 732138-1238182398</option>
                                <option value="mandiri">MANDIRI, Sebapon.id, 732138-1238182398</option>
                                <option value="bni">BNI, Sebapon.id, 732138-1238182398</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Transfer Dari Bank
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            {!! Form::text('bank', null, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap']) !!}
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Atas Nama
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            {!! Form::text('name_send', null, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap']) !!}
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            Bukti Transfer
                        </div>
                        <div class="col-md-8 col-lg-8 black-text">
                            {!! Form::file('images', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-md-4 col-lg-4 black-text">
                            <div class="pull-left">
                            {!! Form::submit('Upload', ['class' => 'btn btn-block btn-primary','style' => 'height:50px; width:130px; padding-top:12px']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                @endif
                @endforeach
        </div>
             
    </div>
        <!-- end content -->
        @stop
        @section('footer')
            @include('web.component.footer')
        @stop