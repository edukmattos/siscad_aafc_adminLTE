@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Acessibilidade</li>
  		<li class="breadcrumb-item"><a href="{!! route('roles') !!}">Grupos de Usuários</a></li>
  		<li class="breadcrumb-item"><b>CONSULTA</b></li>

  		<div class="btn-group btn-group-sm pull-right">
	    	<a href="{!! route('dashboard.pc_members') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Sócios"><i class="fa fa-users"></i></a>
	    	<a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Painel Controle Parceiros"><i class="fa fa-sitemap"></i></a>
	    </div>
	</ol>

	<hr class="hr-warning" />

	<div class="well well-sm text-center">
		<h4>{{ $role->display_name }}</h4>
	</div>

	 
		<div class="col-sm-3">
			<div class="row"> 		
				@include ('roles.users')
			</div>

			<div class="row"> 
				<div class="table-responsive">
					<table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar"> 
						<thead>
							<tr>
								<th data-field="users" data-sortable="true">Usuários</th>
								<th data-field="roles" data-sortable="false" data-width="5%">Grupos</th>
								<th data-width="1%" class="text-center">#</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($role->users as $user)
								<tr>
									<td>{{ $user->name }}</td>
									<td class="text-center"><span class="badge">{{ $user->roles->count() }}</span></td>
									<td>
										<a href="{{ route('roles_users.destroy', [$role->id, $user->id]) }}" id="link_delete" type="button" class="round round-sm hollow red" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-sm-1">
		</div>

		<div class="col-sm-8">

			<div class="row">
				@include ('roles.permissions')
			</div>

			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar"> 
						<thead>
							<tr>
								<th data-field="roles" data-sortable="true">Permissões</th>
								<th data-width="1%" class="text-center">#</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($role->permissions as $permission)
								<tr>
									<td>{{ $permission->display_name }}</td>
									<td>
										<a href="{{ route('roles_permissions.destroy', [$role->id, $permission->id]) }}" id="link_delete" type="button" class="round round-sm hollow red" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$("#permissions_list, #users_list").select2();
	</script>
@endsection
