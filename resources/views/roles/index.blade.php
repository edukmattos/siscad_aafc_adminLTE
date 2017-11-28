@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Acessibilidade</li>
  		<li class="breadcrumb-item"><b>Grupos de Usuários</b></li>

  		<div class="btn-group btn-group-sm pull-right">
	        <a href="{!! route('dashboard.pc_members') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Sócios"><i class="fa fa-users"></i></a>
	        <a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Painel Controle Parceiros"><i class="fa fa-sitemap"></i></a>
	    </div>
	</ol>

	<hr class="hr-warning" />

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('roles.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-field="roles" data-sortable="true">Grupos</th>
					<th data-field="users" data-sortable="false" data-width="5%">Usuários</th>
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
			        <tr>
			        	<td>
			        		@if($role->id == '1')
			        			<a type="button" class="round round-sm hollow red"><i class="fa fa-lock"></i></a>
			        		@else
			        			<a href="{!! route('roles.edit', ['id' => $role->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			        		@endif
			        	</td>
			        	<td><a href="{!! route('roles.show', ['id' => $role->id]) !!}">{{ $role->display_name }}</a></td>
			        	<td class="text-center"><span class="badge"></span></td>
			        	<td>
				       		@if($role->id == '1')
			        			<a type="button" class="round round-sm hollow red"><i class="fa fa-lock"></i></a>
			        		@else
			        			<a href="javascript:;" onclick="onDestroy('{!! route('roles.destroy', [$role->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			        		@endif
				   		</td>
			    	</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_roles').bootstrapTable();
	</script>
@endsection