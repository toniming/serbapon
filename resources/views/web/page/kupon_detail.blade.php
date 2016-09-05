        @extends('web.template')
        @section('navbar')
            @include('web.component.navbar')
        @stop
        @section('content')
        <!-- content -->
        
        <div class="container-fluid">
            <div class="row p-t-3">
                <div class="col-md-1 col-lg-1">&nbsp;</div>
                <div class="col-md-10 col-lg-10">
                    <div class="col-md-8 col-lg-8">
                        @foreach ($kupon as $kupons)
                        <div class="card p-a-2">
                            <h3>{{ $kupons['title'] }}</h3>
                            <hr>
                            <span class="tag dark-text" style="font-size:24px">{{ $kupons['sell'] }} Terjual</span> &nbsp;| 
                            <i class="fa fa-map-marker p-r-1" style="font-size:15px"><b>&nbsp{{ $kupons['location'] }}</b></i> | &nbsp
                            <a target="_blank" href="http://facebook.com/sharer.php?u=http://www.serbapon.co.id">
                                <img src="/images/facebook.png" style="width:30px; height:30px">
                            </a>
                            <a target="_blank" href="http://facebook.com/sharer.php?u=http://www.serbapon.co.id">
                                <img src="/images/twitter.png" style="width:30px; height:30px">
                            </a>
                            <span class="pull-right tag dark-text"><strike><i style="font-size:16px"> 
                                            <?php
                                                $count= strlen($kupons['old_price']);
                                                $price = 0;
                                                if($count<=6)
                                                    $price = substr($kupons['old_price'],0,$count-3).".".substr($kupons['old_price'],$count-3,3);
                                                else if ($count==7)
                                                    $price = substr($kupons['old_price'],0,$count-6).".".substr($kupons['old_price'],1,3).".".substr($kupons['old_price'],$count-3,3);

                                            ?>
                                            Rp {{$price}}</i></strike><font size="6" class="green-text">
                                            <?php
                                                $count= strlen($kupons['price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($kupons['price'],0,$count-3).".".substr($kupons['price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($kupons['price'],0,$count-6).".".substr($kupons['price'],1,3).".".substr($kupons['price'],$count-3,3);

                                            ?>
                                            Rp {{ $price2}}</font> </span>
                            <hr />
                            {!! Html::image('images/'.$kupons['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'width:350px; height:325px']) !!}
                            <hr />
                            <i class="fa fa-calendar"></i><b> {{ $kupons['start'] }} s/d {{ $kupons['end'] }}</b>
                             
                            <hr>
                            <?php  echo $kupons['description']  ?><br /><br />
                            <a href="#" class="btn btn-block green white-text" data-toggle="modal" data-target="#exampleModal" style="height:50px; padding-top:12px; letter-spacing:3px"><b>Buy Now</b></a>
                        </div>
                        <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel">
                        
                            <div class="modal-dialog" role="document">
                            {!! Form::open(array('url' => '/chart/pembelian/'.$kupons['_id'])) !!}
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="exampleModalLabel"><b>Keranjang Belanja&nbsp&nbsp</b><i class="fa fa-cart-plus" aria-hidden="true"></i></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">{{ $kupons['title'] }}</label>
                                      <div class="card">
                                        <div class="card-block">
                                            <div class="col-md-2 col-lg-2">
                                                  {!! Html::image('images/'.$kupons['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'padding:0; width:80px; height:80px']) !!}
                                            </div>
                                            <div class="col-md-7 col-lg-7">
                                                  <?php
                                                        $sum=strlen($kupons['title']);
                                                        $sum2=$sum-55;
                                                        if($sum > 55)
                                                            $title = substr($kupons['title'],0,$sum-$sum2)."...";
                                                        else
                                                            $title = $kupons['title'];
                                                    ?>

                                                    {{ $title }}<br>
                                                    <font size="5" class="green-text">
                                            <?php
                                                $count= strlen($kupons['price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($kupons['price'],0,$count-3).".".substr($kupons['price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($kupons['price'],0,$count-6).".".substr($kupons['price'],1,3).".".substr($kupons['price'],$count-3,3);

                                            ?>
                                            Rp {{ $price2}}</font>
                                            <input type="hidden" id="harga" name="harga" value="{{ $kupons['price'] }}">
                                            </div>
                                            <div class="col-md-3 col-lg-3">
                                                <div class="input-group">
                                                  <span class="input-group-btn">
                                                      <button  type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quantity">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                      </button>
                                                  </span>
                                                  <input onchange="myFunction()" type="text" id="mySelect" name="quantity" class="form-control input-number" value="0" min="0" max="100">
                                                  <span class="input-group-btn">
                                                        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quantity">
                                                          <i class="fa fa-plus" aria-hidden="true"></i>
                                                      </button>
                                                  </span>
                                              </div>
                                            </div>
                                        </div>
                                      </div><br>
                                      <div class="col-md-6 col-lg-6">
                                        <div class="text-black"><b>Total Harga</b></div>
                                      </div>
                                      <div class="col-md-6 col-lg-6">
                                        <b><div class="pull-right" id="demo"></div></b>
                                        <input type="hidden" id="total" name="sub_price">
                                      </div><br><br><br><br>
                                    </div>
                                </div><br>
                                <div class="modal-footer">
                                  <!-- <button type="button" class="btn pull-left btn-default" data-dismiss="modal"><-- Lihat Kupon Lain</button> -->

                                   <input type="submit" value="beli kupon" class="btn btn-block btn-success"></button> 
                                </div>
                              </div>

                            </div>
                          </div>
                        @endforeach

                    </div>
                    <div class="col-md-4 col-lg-4">
                        <center><h4><b>RELATED KUPON:</b></h4></center>
                        @foreach($related as $relateds)
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                            <a href="/kupon/detail/{{ $relateds['_id'] }}">
                                {!! Html::image('images/'.$relateds['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'width:350px; height:230px']) !!}
                            </a>
                                <div class="card-block">
                                    <h5 class="card-title">
                                        <a href="/kupon/detail/{{ $relateds['_id'] }}" class="dark-blue-text">
                                        <?php
                                            $sum=strlen($relateds['title']);
                                            $sum2=$sum-55;
                                            if($sum > 55)
                                                $title = substr($relateds['title'],0,$sum-$sum2)."...";
                                            else
                                                $title = $relateds['title'];
                                        ?>
                                        {{ $title }}
                                        </a>
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                        </div>
                                        <div class="col-md-6 col-lg-6 text-xs-right">
                                        </div>
                                    </div>
                                    <p class="tag dark-text"><i class="fa fa-calendar"></i> {{ $relateds['start'] }} s/d {{ $relateds['end'] }}</p>
                                    <p class="tag dark-text pull-right"><i class="fa fa-map-marker" style="padding-top:4px"></i>&nbsp{{ $relateds['location'] }}</p>
                                    <a href="/kupon/detail/{{ $relateds['_id'] }}" class="btn btn-block green white-text">Tampilkan Banyak Kupon</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1 col-lg-1">&nbsp;</div>
            </div>
        </div>
        
        <!-- end content -->
        @stop
        @section('footer')
            @include('web.component.footer')
        @stop