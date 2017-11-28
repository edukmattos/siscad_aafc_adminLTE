@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="{!! route('employees.search') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Funcionários</b></a></li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
  		<div class="btn-group btn-group-sm pull-right">
        	<a href="{!! route('employees.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	        <a href="{!! route('employees.search') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
	    </div>
	</ol>

	<div class="table-responsive">
       	<table class="table table-bordered table-striped" id="table_employees" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('employees.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-field="region_id" data-sortable="true">Região</th>
					<th data-field="city_id" data-sortable="true">Cidade/UF</th>
					<th data-field="employee_status_id" data-sortable="true">Situação</th>
					<th data-field="code" data-sortable="true" data-align="" width="2%">Matrícula</th>
					<th data-field="cpf" data-sortable="true">CPF</th>
					<th data-field="name" data-sortable="true">Nome</th>
					<th data-field="address">Endereço</th>
					<th data-field="neighborhood">Bairro</th>	
					<th data-field="zip_code">CEP</th>
					<th data-field="email" data-sortable="true">e-mail</th>
					<th data-field="phone">Fone</th>	
					<th data-field="mobile">Celular</th>
					<th data-field="comments">Obs</th>		
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($employees as $employee)
			        <tr>
			        	<td><a href="{!! route('employees.edit', ['id' => $employee->id]) !!}" type="button" class="round round-sm hollow blue"><i class='fa fa-edit'></i></a></td>
			        	<td>{{ $employee->region_description }}</td>
			        	<td>{{ $employee->city_description }}/{{ $employee->state_code }}</td>
			        	<td>{{ $employee->employee_status_description }}</td>
			        	<td class="text-right">
			        		<a href="{!! route('employees.show', ['id' => $employee->id]) !!}">{{ $employee->code }}</a>
			        	</td>
						<td>{{ $employee->cpf_mask }}</td>
			        	<td>{{ $employee->name }}</td>
			        	<td>{{ $employee->address }}</td>
			        	<td>{{ $employee->neighborhood }}</td>
			        	<td>{{ $employee->zip_code_mask }}</td>
			        	<td>{{ $employee->email }}</td>
			        	<td>{{ $employee->phone_mask }}</td>
			        	<td>{{ $employee->mobile_mask }}</td>
			        	<td>{{ $employee->comments }}</td>
			        	<td>
			        		<a href="javascript:;" onclick="onDestroy('{!! route('employees.destroy', [$employee->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_employees').bootstrapTable();
	</script>
@endsection