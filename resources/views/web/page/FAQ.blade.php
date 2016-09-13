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
                        <div class="card p-a-2">
                        <h3 class="dark-blue-text"><b>FAQ</b></h3><hr/>
                        @foreach($FAQ as $FAQs)
                            <div class="dark-blue-text"><b>{{ $FAQs['content']['pertanyaan'] }}</b></div>
                            <div class="text-justify"> {{ $FAQs['content']['jawaban'] }}</div><br>
                        @endforeach
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <center><h4><b>NEW PROMO:</b></h4></center>
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