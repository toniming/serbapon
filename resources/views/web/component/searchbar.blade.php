<!-- search --> 
<div class="container-fluid navbar-color">
	<div class="row">
		<div class="col-md-12">
		  	<div class="container hidden-md-up">
		  			<div class="row">
						<div class="col-md-12 col-lg-12">
							{!! Form::open(['class' => 'p-t-1']) !!}
								<fieldset class="form-group">
									<div class="input-group">
										{!! Form::text('promo', null, ['class' => 'form-control bg-danger white-text', 'placeholder' => 'ketikan nama promo']) !!}
										<div class="input-group-btn">
											{!! Form::submit('Search', ['class' => 'btn dark-blue white-text']) !!}
										</div>
									</div>
								</fieldset>
							{!! Form::close() !!}
						</div>
					</div>
			</div>
			<div class="container hidden-sm-down">
	  			{!! Form::open(['class' => 'p-y-1 form-inline','url' => '/search', 'method' => 'post']) !!}
			  		<div class="row">
		  				<div class="col-md-12 col-lg-12">
		  					<div class="col-md-2 col-lg-2">
	  						{!! Form::text('deal', null, ['class' => 'form-control w-100', 'placeholder' => 'Temukan dealmu']) !!}
	  						</div>
		  					<div class="col-md-1 col-lg-1">
	  						{!! Form::text('location', null, ['class' => 'form-control icon-awesome-placeholder', 'style' => 'width:100px','placeholder' => '&#xf041; Lokasi', 'id' => 'tags']) !!}
	  						</div>
	  						<div class="col-md-2 col-lg-2" style="margin-left:10px">
	  							<label for="exampleInputName2" style="padding-top:5px"><b>&nbsp; HARGA &nbsp;</b></label>
	  							{!! Form::text('start_price', null, ['class' => 'form-control', 'style' => 'width:77px', 'placeholder' => 'Awal', 'id' => 'tags']) !!}
	  						</div>
	  						<div class="col-md-1 col-lg-1" style="margin-left:-30px">
		  						{!! Form::text('end_price', null, ['class' => 'form-control', 'style' => 'width:77px', 'placeholder' => 'Akhir', 'id' => 'tags']) !!} 
		  					</div>
		  					<div class="col-md-2 col-lg-2">
	  						<select name="cat" class="form-control w-100">
	  							<option value="Termurah">Termurah</option>
	  							<option value="Terbaru">Terbaru</option>
	  							<option value="Termahal">Termahal</option>
	  							<option value="Terlaris">Terlaris</option>
	  						</select>
							 </div>
							 <div class="col-md-3 col-lg-3">
		  					<label for="exampleInputName2" style="padding-top:5px"><b>&nbsp; KATEGORI &nbsp;</b></label>
		  					<select name="category" class="form-control w-90">
	  							<option value=" "> </option>
	  							<option value="Food">Food</option>
	  							<option value="Service">Service</option>
	  							<option value="Vacation">Vacation</option>
	  							<option value="Travel">Travel</option>
	  						</select>
		  					</div>
							 <div class="col-md-1 col-lg-1 pull-right">
		  					<button type="submit" class="btn green white-text" style="width:100px"><i class="fa fa-search"></i> Cari</button>
		  					</div>
		  				</div>
			  		</div>
			  	{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
<!-- end search -->