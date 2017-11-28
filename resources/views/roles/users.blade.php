{!! Form::open(['route' => ['roles_users.store', $role->id], 'class'=>'form-vertical', 'role'=>'form']) !!}
    <div class="form-group">
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="input-group input-group-sm">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				{!! Form::select('user_id', $role_users, null, ['id'=>'users_list', 'class'=>'form-control']) !!}
			</div>
		</div>
	</div>

	
		<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1 pull-left">
			<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></button>
		</div>
	
{!! Form::close() !!}
