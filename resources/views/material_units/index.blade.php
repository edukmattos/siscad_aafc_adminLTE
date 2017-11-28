@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Materiais</li>
  		<li class="breadcrumb-item">Unidades</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
	</ol>
				
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_material_units" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
		    <thead>
		        <th data-width="1%" class="text-center">
		        	<a href="{!! route('material_units.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
		        </th>
		        <th data-width="2%">Código</th>
		        <th>Descrição</th>
		        <th data-width="1%" class="text-center">#</th>
		    </thead>
		    <tbody>
			    @foreach($material_units as $material_unit)
			        <tr>
			            <td>
			                <a href="{!! route('material_units.edit', [$material_unit->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            <td>{!! $material_unit->code !!}</td>
			            <td>{!! $material_unit->description !!}</td>
			            <td>
			            	<a href="javascript:;" onclick="onDestroy('{!! route('material_units.destroy', [$material_unit->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_material_units').bootstrapTable();
	</script>
@endsection