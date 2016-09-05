@extends('cms.pages.transaction.template')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_add_search', ['component' => [
		'title'			=> 'transaction ' . $page_datas->datas->currentPage(),
		'link-add'		=> route('cms.transaction.transaction.create'),
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
						<th class="col-md-3">Email User</th>
						<th class="col-md-2">ID Nota</th>
						<th class="col-md-2">buying date</th>
						<th class="col-md-3">status</th>
						<th class="col-md-1">action</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($page_datas->datas as $key => $data)
						@forelse ($page_datas->users as $keys => $user)
					@if($user['id'] == $data['id_user'])
						<tr>
							<td class="col-md-1">
								{{($page_datas->datas->perpage() * ($page_datas->datas->currentPage()-1)) + ($key + 1)}}
							</td>
							<td class="col-md-3">
								<a href="{{route('transaction.detail', ['id' => $data['id_notaa']])}}">
									{{ $user['email'] }}
								</a>
							</td>
							<td class="col-md-2">
								{{ $data['id_notaa'] }}
							</td>
							<td class="col-md-2">
								{{ $data['date_buy'] }}
							</td>
							<td class="col-md-3">
						        {{ $data['status'] }}
							</td>
							<td class="col-md-1">
								{{ Form::open(['method' => 'DELETE', 'url' => 'cms/transaction/transaction/'.$data['id']])}}
								<a href="{{route('cms.transaction.transaction.show', ['id' => $data['id']])}}" class="btn btn-primary btn-sm">
									<i class="fa fa-pencil" aria-hidden="true"></i>
						        </a>
						        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDelete" data-action="{!! route('cms.transaction.transaction.destroy', ['id' => $data['id']]) !!}" onClick="return confirm('Yakin ingin menghapus data?');">
								<i class="fa fa-trash" aria-hidden="true"></i>
								</button>
						        {{ Form::close() }}	
							</td>
						</tr>
						
					@endif
					@empty
						<tr>
							<td COLSPAN=4>
								Tidak ada data
							</td>
						</tr>
					@endforelse

					@empty	
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