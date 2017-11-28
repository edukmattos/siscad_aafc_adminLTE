<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control', 'maxlength'=>'100']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'100']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('material_unit_id') ? 'has-error' : '' }}">
	<label for="city_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unidade:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('material_unit_id', $material_units, $value = null, ['id'=>'material_units_list', 'class'=>'form-control']) !!}
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
	  	$("#material_units_list").select2();
	</script>
@endsection