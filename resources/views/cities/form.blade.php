<div class="form-group">
	{!! Form::label('state_id', 'UF:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('state_id', $states, $value = null, ['id'=>'states_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	{!! Form::label('description', 'Descrição:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
	{!! Form::label('region_id', 'Região:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('region_id', $regions, $value = null, ['id'=>'regions_list', 'class'=>'form-control', 'maxlength'=>'40']) !!}
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
	  	$('#states_list, #regions_list').select2();
	</script>
@endsection