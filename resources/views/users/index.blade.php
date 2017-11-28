@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Acessibilidade</li>
  		<li class="breadcrumb-item"><b>Usuários</b></li>
	</ol>

	<hr class="hr-warning" />

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_users" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('users.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-width="1%" data-sortable="false">Avatares</th>
					<th data-width="5%" data-sortable="true">Usuários</th>
					<th data-sortable="true">Nomes</th>
					<th data-width="10%" data-sortable="true">e-mails</th>
					<th data-width="5%" data-sortable="false">Situação</th>
					<th>Grupos</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
			        <tr>
			        	<td><a href="{!! route('users.edit', ['id' => $user->id]) !!}" type="button" class="round round-sm hollow blue"><i class='fa fa-edit'></i></a></td>
			        	<td>
			        		<img src="/uploads/avatars/users/{{ $user->avatar }}" class="img-circle img-responsive center-block" width="25">
			        	</td>
			        	<td class="text-left"><a href="{!! route('users.show', ['id' => $user->id]) !!}">{{ $user->name }}</a></td>
			        	<td class="text-left">{{ $user->fullname }}</td>
			        	<td>{{ $user->email }}</td>
			        	<td class="text-center">
			        		@if($user->user_status_id == '1')
			        			<a href="{!! route('users.enable', ['id' => $user->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Ativar"><i class='fa fa-thumbs-o-down'></i></a>
			        		@endif

			        		@if($user->user_status_id == '2')
			        			<a href="{!! route('users.disable', ['id' => $user->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Desativar"><i class='fa fa-thumbs-o-up'></i></a>
			        		@endif
			        	</td>
			        	<td>
			        		@foreach($user->roles as $user->role)
			        			<a href="{!! route('roles.show', ['id' => $user->role->id]) !!}">{{ $user->role->display_name }}</a>
			        		@endforeach	
			        	</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_users').bootstrapTable();
	</script>
@endsection