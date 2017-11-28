@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Localidades</li>
  		<li class="breadcrumb-item">Regiões</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
	</ol>

    <div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_regions" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar">  
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('regions.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-width="5%">Código</th>
					<th>Descrição</th>
					<th data-width="5%">Cidades</th>				
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($regions as $region)
			        <tr>
			        	<td>
				        	<a href="{!! route('regions.edit', ['id' => $region->id]) !!}" type="button" class="round round-sm hollow blue"><i class='fa fa-edit'></i></a>
			        	</td>
			        	<td><a href="{!! route('regions.show', [$region->id]) !!}">{{ $region->code }}</a></td>
			        	<td>{{ $region->description }}</td>
			        	<td class="text-center">
			        		<span class="badge">
			        			@if (!$region->cities)
			        				0
			        			@else
			        				{{ $region->cities->count() }}
			        			@endif
			        		</span></td>
			        	<td>
			        		<a href="javascript:;" onclick="onDestroy('{!! route('regions.destroy', [$region->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_regions').bootstrapTable();
	</script>
@endsection