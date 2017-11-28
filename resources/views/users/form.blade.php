<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
	<label for="name" class="col-lg-2 control-label">Usuário:</label>
	<div class="col-xs-11 col-sm-8 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			{!! Form::text('name', $value = null, ['id'=>'name', 'class'=>'form-control', 'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }} ">
	<label for="name" class="col-lg-2 control-label">Nome completo:</label>
	<div class="col-xs-11 col-sm-8 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			{!! Form::text('fullname', $value = null, ['id'=>'fullname', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
	<label for="email" class="col-lg-2 control-label">e-mail:</label>
	<div class="col-xs-11 col-sm-7 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			{!! Form::text('email', $value = null, ['id'=>'email', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
	{!! Form::label('role_id', 'Grupo:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('role_id', $roles, $value = null, ['id'=>'roles_list', 'class'=>'form-control', 'maxlength'=>'40']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
		<div class="form-group col-sm-4">
			<button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
			<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>

@section('js_scripts')
	<script type="text/javascript">
	  	$('#roles_list').select2();
	</script>
@endsection

