@extends('cms.crm.layout')
@section('page_content')

<ul class="nav nav-tabs" id="detail-menu " role="tablist">
	<li class="nav-item active">    
		 <a class="nav-link" data-toggle="tab" href="#home" role="tab">Subscribber</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#profile" role="tab">Newsletter</a>
	</li>
	<!-- cont. here	-->
	</ul>   
	<div class="row" style="margin-top: -2px;">
		<div class="col-sm-12">
			<div class="card card-block">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="home" role="tabpanel">
						1
					</div>
				  	<div class="tab-pane fade" id="profile" role="tabpanel">
				  		halo
				  	</div>
					<!-- cont. here	-->
				</div>          
			</div>          
		</div>          
	</div> 
</div>
@stop