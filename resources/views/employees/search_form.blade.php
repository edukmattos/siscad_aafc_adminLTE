<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Matrícula:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_employee_code', old('srch_employee_code'), ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
	<label for="cpf" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">CPF:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_employee_cpf', old('srch_employee_cpf'), ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label for="name" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nome:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('srch_employee_name', old('srch_employee_name'), ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="gender_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Sexo:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_employee_gender_id', $genders, old('srch_employee_gender_id'), ['id'=>'genders_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="region_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Região:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_employee_region_id', $regions, old('srch_employee_region_id'), ['id'=>'regions_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="city_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Cidade:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_employee_city_id', $cities, old('srch_employee_city_id'), ['id'=>'cities_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="employee_status_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Situação:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_employee_status_id', $employee_statuses, old('srch_employee_status_id'), ['id'=>'employee_statuses_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="employee_status_reason_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Motivo:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_employee_status_reason_id', $employee_status_reasons, old('srch_employee_status_reason_id'), ['id'=>'employee_status_reasons_list', 'class'=>'form-control']) !!}
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
	  	$("#plans_list, #employee_statuses_list, #employee_status_reasons_list, #genders_list, #regions_list, #cities_list, #banks_list").select2();
	</script>
@endsection
