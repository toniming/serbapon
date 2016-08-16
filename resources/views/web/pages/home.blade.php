@extends('web.template')
@section('navbar')
	@include('web.component.navbar')
@stop
@section('searchbar')
	@include('web.component.searchbar')
@stop
@section('content')
	<!-- content -->
	@if(Session::has('message-success'))
		<center><div class="alert alert-success">{{Session::get('message-success')}}</div></center>
	@endif
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12 text-xs-center p-b-2 p-t-3">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner" role="listbox">
				    <div class="carousel-item active">
				  		{!! Html::image('images/banner.jpg', null, ['class' => 'card-img-top img-fluid', 'alt' => 'First slide']) !!}
				    </div>
				    <div class="carousel-item">
				  		{!! Html::image('images/banner.jpg', null, ['class' => 'card-img-top img-fluid', 'alt' => 'First slide']) !!}
				    </div>
				    <div class="carousel-item">
				  		{!! Html::image('images/banner.jpg', null, ['class' => 'card-img-top img-fluid', 'alt' => 'First slide']) !!}
				    </div>
				  </div>
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="icon-prev" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="icon-next" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
			<div class="col-md-12 col-lg-12 text-xs-center p-b-2 p-t-3">
				<h3><b>DAFTAR KUPON</b></h3>
				<hr>
			</div>
		</div>
	</div>
	<div class="container p-b-3">
		<div class="row">
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

										{{ $title }}
										</a>
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
											<p class="tag dark-text">{{ $kupons['sell'] }}+ Terjual</p>
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
		<div class="row">
			<div class="col-md-4 offset-md-4">
			  	<a href="{{ url('/promo') }}" class="btn btn-block btn-view-all black-text m-t-2">Lihat Semua Promo</a>
			</div>
		</div>
	</div>
	<!-- end content -->
@stop
@section('footer')
	@include('web.component.footer')
@stop