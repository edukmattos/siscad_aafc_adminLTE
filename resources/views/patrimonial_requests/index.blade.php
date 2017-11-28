@extends('layouts.app')

@section('content')
	<ol class="breadcrumb breadcrumb-danger">
	  	<li>Patrimônios</li>
	  	<li>Requisições</li>
	  	<li><b>PESQUISA</b></li>

	  	<div class="btn-group btn-group-sm pull-right">
	   		<a href="{!! route('patrimonial_requests.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
	   	</div>
	</ol>

	<div class="table-responsive">
       	<table class="table table-bordered table-striped" id="table_patrimonial_requests" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('patrimonial_requests.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-field="from_employee_id" data-sortable="true">Origem</th>
					<th data-field="to_employee_id" data-sortable="true">Destino</th>
					<th data-field="to_patrimonial_status_date" data-align="center" data-sortable="true">Movimentação</th>
					<th data-field="to_management_unit_id" data-align="center">Unid.Gestora</th>
					<th data-field="to_company_sector_id">Setor</th>
					<th data-field="to_company_sub_sector_id" data-sortable="true">Sub-Setor</th>
					<th data-field="comments" data-align="left">Justificativa</th>
					<th data-field="patrimonial_request_status_id" data-sortable="true" data-align="center">Situação</th>
				</tr>
			</thead>
			<tbody>
			    @foreach($patrimonial_requests as $patrimonial_request)
			        <tr>
			            <td><a href="{!! route('patrimonial_requests.show', [$patrimonial_request->id]) !!}">{!! $patrimonial_request->id !!}</a></td>
			            <td>{!! $patrimonial_request->from_employee->name !!}</td>
			            <td>{!! $patrimonial_request->to_employee->name !!}</td>
			            <td>
			            	@if($patrimonial_request->to_patrimonial_status_date!=null)
			                    {{ $patrimonial_request->to_patrimonial_status_date->format('d/m/Y') }}
			                @endif
			            </td>
			            <td>{!! $patrimonial_request->to_management_unit->code !!}</td>
			            <td>{!! $patrimonial_request->to_company_sector->description !!}</td>
			            <td>{!! $patrimonial_request->to_company_sub_sector->description !!}</td>
			            <td>{!! $patrimonial_request->comments !!}</td>
			            <td>{!! $patrimonial_request->patrimonial_request_status->description !!}</td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_patrimonial_requests').bootstrapTable();
	</script>
@endsection