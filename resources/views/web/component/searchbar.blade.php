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
	  			{!! Form::open(['class' => 'p-y-1 form-inline']) !!}
			  		<div class="row">
		  				<div class="col-md-12 col-lg-12">
		  					<div class="col-md-5 col-lg-5">
	  						{!! Form::text('name', null, ['class' => 'form-control w-100', 'placeholder' => 'Temukan deal favoritemu!!!']) !!}
	  						</div>
		  					<div class="col-md-2 col-lg-2">
	  						<div class="form-group">
	  						{!! Form::text('location', null, ['class' => 'form-control  icon-awesome-placeholder', 'placeholder' => '&#xf041; Lokasi']) !!}
	  						</div>	
	  						</div>

		  					<div class="col-md-3 col-lg-3 p-l-3">
			  				<div class="form-group">
							   <label for="exampleInputName2"><b>&nbsp; Kategori &nbsp;</b></label>
	  						<select class="form-control w-50">
	  							<option value="termurah">termurah</option>
	  							<option value="puji">puji</option>
	  							<option value="sayang">sayang</option>
	  						</select>
							 </div>
							 </div>
							 <div class="col-md-2 col-lg-2">
		  					<button type="submit" class="btn green white-text w-100 m-l-1"><i class="fa fa-search"></i> Cari</button>
		  					</div>
		  				</div>
			  		</div>
			  	{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
<!-- end search -->