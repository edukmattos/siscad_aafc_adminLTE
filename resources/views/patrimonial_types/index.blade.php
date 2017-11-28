@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item">Tipos</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
	</ol>
				
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_patrimonial_types" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="true" data-show-filter="true" data-show-columns="false" data-show-export="true" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
		    <thead>
		        <th data-width="1%" class="text-center">
		        	<a href="{!! route('patrimonial_types.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
		        </th>
		        <th data-field="code" data-sortable="false" data-width="2%">Código</th>
		        <th data-field="description" data-sortable="false">Descrição</th><th>Conta Ativo</th>
		        <th>Conta Depreciação</th>
		        <th data-align="center">Vida útil (anos)</th>
		        <th data-width="1%" class="text-center">#</th>
		    </thead>
		    <tbody>
			    @foreach($patrimonial_types as $patrimonial_type)
			        <tr>
			            <td>
			                <a href="{!! route('patrimonial_types.edit', [$patrimonial_type->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            <td><a href="{!! route('patrimonial_types.show', [$patrimonial_type->id]) !!}">{!! $patrimonial_type->code !!}</a></td>
			            <td>{!! $patrimonial_type->description !!}</td>
			            <td>{{ $patrimonial_type->asset_accounting_account->code }} - {{ $patrimonial_type->asset_accounting_account->description }} ({{ $patrimonial_type->asset_accounting_account->account_balance_type->code }})</td>
			            <td>{{ $patrimonial_type->depreciation_accounting_account->code }} - {{ $patrimonial_type->depreciation_accounting_account->description }} ({{ $patrimonial_type->depreciation_accounting_account->account_balance_type->code }})</td>
			            <td>{{ $patrimonial_type->useful_life_years }}</td><td>
			            	<a href="javascript:;" onclick="onDestroy('{!! route('patrimonial_types.destroy', [$patrimonial_type->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_patrimonial_types').bootstrapTable();
	</script>
@endsection