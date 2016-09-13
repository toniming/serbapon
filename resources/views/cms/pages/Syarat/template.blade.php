@extends('cms.template')
@section('content')
<div class="container-fluid">
	<div class="row clearfix">
		&nbsp;
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-lg-3">
		@include('cms.widgets.sidebar', [
			'title' 		=> 'Website',
			'description' 	=> 'Konfigurasi Website',
			'components' => [
								'0' => ['link' => Route('cms.FAQ.FAQ.index'), 'caption' => 'FAQ'],
								'1' => ['link' => Route('cms.about.about.index'), 'caption' => 'About Us'],
								'2' => ['link' => Route('cms.contact.contact.index'), 'caption' => 'Contact Us'],
								'3' => ['link' => Route('cms.syarat.syarat.index'), 'caption' => 'Syarat dan ketentuan'],
		]])
		</div>
 
		<div class="col-xs-12 col-lg-9">
			<div class="row mb-s">
				<div class="col-sm-12">
					@yield('page_content')
				</div>
			</div>
		</div>
	</div>
</div>
@stop