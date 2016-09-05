        @extends('web.template')
        @section('navbar')
            @include('web.component.navbar')
        @stop
        @section('content')
        <!-- content -->
        <div class="container">
            <div class="card" style="margin-top:20px">
                <div class="card-block white-text" style="background-color:#808080">
                    <div class="col-md-2 col-lg-2">
                        <b>Item</b>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <b>Price</b>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <b><center>Quantity</center></b>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <b>Total</b><br>
                    </div>
                    <div class="col-md-1 col-lg-1">
                    </div>
                </div>

                @foreach ($chart as $k => $charts)
                @if(Session('id') == $charts['id_user'])
                <div class="card-block">
                    <div class="col-md-2 col-lg-2">
                        <b>{!! Html::image('images/'.$charts['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'width:100px; height:100px']) !!}</b>
                     </div>
                     <div class="col-md-3 col-lg-3">
                      {{ $charts['title'] }}  
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <font size="3"><b>
                        <input type="hidden" id="harga" name="harga" value="{{ $charts['price'] }}">
                                            <?php
                                                $count= strlen($charts['price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($charts['price'],0,$count-3).".".substr($charts['price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($charts['price'],0,$count-6).".".substr($charts['price'],1,3).".".substr($charts['price'],$count-3,3);

                                            ?>
                                            Rp {{ $price2}}</b></font>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <center><div class="input-group">
                                                  <span class="input-group-btn">
                                                      <button  type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantity{{$k}}">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                      </button>
                                                  </span>
                                                  <input onchange="myFunction()" type="text" id="mySelect" name="quantity{{$k}}" class="form-control input-number" value={{$charts['quantity']}} min="0" max="100">
                                                  <span class="input-group-btn">
                                                        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity{{$k}}">
                                                          <i class="fa fa-plus" aria-hidden="true"></i>
                                                      </button>
                                                  </span>
                                              </div></center>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <b><div style="margin-top:8px" size="3" class="green-text" class="total" id="demo"></div></b><br>
                    </div>
                    <div class="col-md-1 col-lg-1">
                        <a class="cart_quantity_delete" href="/chart/delete/{{ $charts['_id'] }} "><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="card-block white-text" style="background-color:#ccc">
                    <div class="col-md-9 col-lg-9 black-text">
                        <h5><b>Total Pembayaran :</b><h5>
                    </div>
                    <div class="col-md-1 col-lg-1 black-text">
                        <b>=</b><br>
                    </div>
                    <div class="col-md-2 col-lg-2">
                    </div>
                </div>
            </div>
            <button onclick="goBack()" class="btn btn-default fa fa-chevron-left" style="height:50px; width:200px">&nbsp Belanja Lagi</button>
            <div class="pull-right">
                <a href="/metode_pembayaran" class="btn btn-block btn-success" style="height:60px; width:300px; padding-top:20px"><b>PEMBAYARAN</b></a><br>
            </div>
        </div>
        <!-- end content -->
        @stop
        @section('footer')
            @include('web.component.footer')
        @stop