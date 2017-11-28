@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Localidades</li>
  		<li class="breadcrumb-item">Cidades</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>

  		<div class="btn-group btn-group-sm pull-right">
	        <a href="{!! route('dashboard.pc_members') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Sócios"><i class="fa fa-users"></i></a>
	        <a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Painel Controle Parceiros"><i class="fa fa-sitemap"></i></a>
	    </div>
	</ol>

    <div class="table-responsive">
	    <table class="table table-bordered table-striped" id="table_cities" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('cities.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-width="2%">UF</th>
					<th>Descrição</th>
					<th data-width="2%">Região</th>					
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cities as $city)
			        <tr>
			        	<td><a href="{!! route('cities.edit', ['id' => $city->id]) !!}" type="button" class="round round-sm hollow blue"><i class='fa fa-edit'></i></a></td>
			        	<td>{{ $city->state->code }}</td>
			        	<td>{{ $city->description }}</td>
			        	<td><a href="{!! route('regions.show', ['id' => $city->region_id]) !!}">{{ $city->region->code }}</a></td>
			        	<td>
			        		<a href="javascript:;" onclick="onDestroy('{!! route('cities.destroy', [$city->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_cities').bootstrapTable();
	</script>
@endsection