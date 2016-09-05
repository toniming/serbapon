<h4 class="card-title">
	{{$component['title']}}
	<a href="{{$component['link-add']}}" class="pull-right btn btn-primary">
		<i class="fa fa-plus"></i>
	</a>
</h4>
<div class="card-text">
	<form method="POST" action="{{$component['link-search']}}" accept-charset="UTF-8" class="m-t-2 p-y-0">
		{!! Form::token() !!}
		<div class="input-group">
			<input type="text" name="search" value="" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
			</span>
		</div>
	</form>
</div>