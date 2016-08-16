        @extends('web.template')
        @section('navbar')
            @include('web.component.navbar')
        @stop
        @section('searchbar')
            @include('web.component.searchbar')
        @stop
        @section('content')
        <!-- content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 p-t-2">
                    <center><h4><b>DAFTAR KUPON</b></h4></center>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
            <hr>
            @foreach ($kupon as $kupons)
                <div class="col-md-4 col-lg-4 p-b-2">
                    <a href="{{ url('/kupon/detail/{id}') }}" >
                        <div class="card bg-faded">
                            {!! Html::image('images/'.$kupons['images']['originalName'], null, ['class' => 'card-img-top img-fluid']) !!}
                            <div class="card-block">
                                <h5 class="card-title">
                                    <a class="dark-blue-text">
                                    <?php
                                            $sum=strlen($kupons['title']);
                                            $sum2=$sum-55;
                                            if($sum > 55)
                                                $title = substr($kupons['title'],0,$sum-$sum2)."...";
                                            else
                                                $title = $kupons['title'];
                                        ?>

                                        {{ $title }}</a>
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <p class="tag dark-text"><i class="fa fa-calendar"></i> 18-06-2016 s/d 20-07-2016</p>
                                    </div>
                                    <div class="col-md-6 col-lg-6 text-xs-right">
                                        <span class="tag grey dark-text">Iklan Tidak Aktif</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                        <p class="tag dark-text">{{ $kupons['sell'] }}+Terjual</p>
                                    </div>
                                    <div class="col-md-9 col-lg-9 text-xs-right">
                                        <span class="tag dark-text"><strike><i>
                                        <?php
                                                $count= strlen($kupons['old_price']);
                                                $price = 0;
                                                if($count<=6)
                                                    $price = substr($kupons['old_price'],0,$count-3).".".substr($kupons['old_price'],$count-3,3);
                                                else if ($count==7)
                                                    $price = substr($kupons['old_price'],0,$count-6).".".substr($kupons['old_price'],1,3).".".substr($kupons['old_price'],$count-3,3);

                                            ?>
                                            Rp {{$price}}</i></strike><font size="5" class="green-text">
                                            <?php
                                                $count= strlen($kupons['price']);
                                                $price2 = 0;
                                                if($count<=6)
                                                    $price2 = substr($kupons['price'],0,$count-3).".".substr($kupons['price'],$count-3,3);
                                                else if ($count==7)
                                                    $price2 = substr($kupons['price'],0,$count-6).".".substr($kupons['price'],1,3).".".substr($kupons['price'],$count-3,3);

                                            ?>
                                            Rp {{ $price2}}</font> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </a>
                </div>
            @endforeach
        </div>
    </div>
            
            <!-- pagination -->
            <div class="container-fluid">
                <div class="row">        
                <div class="col-md-1 col-lg-1">&nbsp;</div>
                <div class="col-md-10 col-lg-10">
                    <div class="col-md-12 col-lg-12">
                         <center><nav>
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true" class="fa fa-step-backward"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active">
                              <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true" class="fa fa-step-forward"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav></center>  
                    </div>       
                </div>
                <div class="col-md-1 col-lg-1">&nbsp;</div>
            </div>
        </div>
        <!-- container -->
        <!-- end content -->
        @stop
        @section('footer')
            @include('web.component.footer')
        @stop