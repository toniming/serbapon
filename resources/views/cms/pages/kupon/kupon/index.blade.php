@extends('cms.pages.kupon.template')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_add_search', ['component' => [
		'title'			=> 'kupon ' . $page_datas->datas->currentPage(),
		'link-add'		=> route('cms.kupon.kupon.create'),
		'link-search'	=> '#',
	]])
	</div>
	@include('cms.widgets.alertbox')
	<div class="card-block">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-md-1">#</th>
						<th class="col-md-3">Title</th>
						<th class="col-md-4">Description</th>
						<th class="col-md-2">Published at</th>
						<th class="col-md-2 text-xs-right">Control</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($page_datas->datas as $key => $data)
						<tr>
							<td class="col-md-1">
								{{($page_datas->datas->perpage() * ($page_datas->datas->currentPage()-1)) + ($key + 1)}}
							</td>
							<td class="col-md-3">
								<a href="{{route('cms.kupon.kupon.show', ['id' => $data['id']])}}">
									{{ $data['title'] }}
								</a>
							</td>
							<td class="col-md-4">
								{{ $data['description'] }}
							</td>
							<td class="col-md-2">
								{{ $data['published_at'] }}
							</td>
							<td class="col-md-2 text-xs-right">
						        {{ Form::open(['method' => 'DELETE', 'url' => 'cms/kupon/kupon/'.$data['id']])}}
						        <a href="{{route('cms.kupon.kupon.edit', ['id' => $data['id']])}}" class="btn btn-primary btn-sm">
									<i class="fa fa-pencil" aria-hidden="true"></i>
						        </a>	
								<button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDelete" data-action="{!! route('cms.kupon.kupon.destroy', ['id' => $data['id']]) !!}" onClick="return confirm('Yakin ingin menghapus data?');">
									<i class="fa fa-times" aria-hidden="true"></i>
								</button>
								{{ Form::close() }}
							</td>
						</tr>					
					@empty
						<tr>
							<td COLSPAN=4>
								Tidak ada data
							</td>
						</tr>
					@endforelse							
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop

@section('modal')
	@include('cms.modals.delete')
@append