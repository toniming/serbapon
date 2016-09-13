@extends('cms.pages.Contact.template')
@section('page_content')
<div class="card">
	<div class="card-block">
	@include('cms.widgets.components.title.title_add_search', ['component' => [
		'title'			=> 'contact ' . $page_datas->datas->currentPage(),
		'link-add'		=> route('cms.contact.contact.create'),
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
						<th class="col-md-9">Pertanyaan</th>
						<th class="col-md-2 text-xs-right">Control</th>
					</tr>
				</thead>
				<tbody>
					@forelse ($page_datas->datas as $key => $data)
						<tr>
							<td class="col-md-1">
								{{($page_datas->datas->perpage() * ($page_datas->datas->currentPage()-1)) + ($key + 1)}}
							</td>
							<td class="col-md-4">
								<a href="{{route('cms.contact.contact.show', ['id' => $data['id']])}}">
									{{ $data['content']['contact'] }}
								</a>
							</td>
							<td class="col-md-2 text-xs-right">
							{{ Form::open(['method' => 'DELETE', 'url' => 'cms/contact/contact/'.$data['id']])}}
						        <a href="{{route('cms.contact.contact.edit', ['id' => $data['id']])}}" class="btn btn-primary btn-sm">
									<i class="fa fa-pencil" aria-hidden="true"></i>
						        </a>	
								<button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDelete" data-action="{!! route('cms.contact.contact.destroy', ['id' => $data['id']]) !!}" onClick="return confirm('Yakin ingin menghapus data?');">
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