{!! Form::open(['route' => ['roles_permissions.store', $role->id], 'class'=>'form-vertical', 'role'=>'form']) !!}
 	<div class="form-group">
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<div class="input-group input-group-sm">
				<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
				{!! Form::select('permission_id', $role_permissions, null, ['id'=>'permissions_list', 'class'=>'form-control']) !!}
			</div>
		</div>
	</div>

	<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
		<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></button>
	</div>
{!! Form::close() !!}
