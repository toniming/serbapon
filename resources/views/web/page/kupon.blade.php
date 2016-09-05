        @extends('web.template')
        @section('navbar')
            @include('web.component.navbar')
        @stop
        @section('searchbar')
            @include('web.component.searchbar')
        @stop
        @section('content')
        <!-- content -->
        @if(Session::has('search'))
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 p-t-2">
                    Hasil Pencarian <b>"{{ $title }}"</b> di <b>"{{ $location }}"</b> dengan rentan harga <b>"{{ $start }}"</b> - <b>"{{ $end }}"</b> dengan urutan dari <b>"{{ $category }}"</b>
                </div>
            </div>
        </div>
        @endif

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
                        <div class="card bg-faded">
                        <a href="/kupon/detail/{{ $kupons['_id'] }}">
                            {!! Html::image('images/'.$kupons['images']['originalName'], null, ['class' => 'card-img-top img-fluid', 'style' => 'width:350px; height:325px']) !!}
                            </a>
                            <div class="card-block">
                                <h5 class="card-title">
                                    <a href="/kupon/detail/{{ $kupons['_id'] }}" class="dark-blue-text" style="font-size:18px">
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
                                        <p class="tag dark-text"><i class="fa fa-calendar"></i> {{ $kupons['start'] }} s/d {{ $kupons['end'] }}</p>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                            <p class="tag dark-text pull-right"><i class="fa fa-map-marker"></i> {{ $kupons['location'] }}</p>
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
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <center>{{ $kupon->links() }}</center>
                </div>
            </div>
        </div>
            
            <!-- pagination -->
        <!-- container -->
        <!-- end content -->
        @stop
        @section('footer')
            @include('web.component.footer')
        @stop