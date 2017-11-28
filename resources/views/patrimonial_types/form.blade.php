<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	{!! Form::label('code', 'Código:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', null, array('class'=>'form-control', 'autofocus'=>'autofocus')) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	{!! Form::label('description', 'Descrição:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-8 col-sm-6 col-md-4 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('asset_accounting_account_id') ? 'has-error' : '' }}">
	<label for="asset_accounting_account_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Conta contábil Ativo:</label>
	<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('asset_accounting_account_id', $asset_accounting_accounts, $value = null, ['id'=>'asset_accounting_accounts_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('depreciation_accounting_account_id') ? 'has-error' : '' }}">
	<label for="depreciation_accounting_account_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Conta contábil Depreciação:</label>
	<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('depreciation_accounting_account_id', $depreciation_accounting_accounts, $value = null, ['id'=>'depreciation_accounting_accounts_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('useful_life_years') ? 'has-error' : '' }}">
	{!! Form::label('useful_life_years', 'Vida útil (anos):', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('useful_life_years', $value = null, ['id'=>'useful_life_years', 'class'=>'form-control']) !!}
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
	  	$("#asset_accounting_accounts_list, #depreciation_accounting_accounts_list").select2();

	    $("#useful_life_years").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '.',
		    limit: false,
		    centsLimit: 0,
		    clearPrefix: false,
		    allowNegative: false
  		});
	</script>
@endsection
