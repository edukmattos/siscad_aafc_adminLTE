@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="{!! route('patrimonials.search_results_back') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Patrimônios</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÂO</b></li>

  		<div class="btn-group btn-group-sm pull-right">
			<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a> 
	        <a href="{!! route('patrimonials.search') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
	    </div>
	</ol>

	{!! Form::model($patrimonial, ['route' => ['patrimonials.update', $patrimonial->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.edit_form')

	{!! Form::close() !!}
	    
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$("#patrimonial_types_list, #patrimonial_sub_types_list, #patrimonial_brands_list, #patrimonial_models_list, #providers_list, #patrimonial_sectors_list, #patrimonial_sub_sectors_list, #patrimonial_statuses_list").select2();

	  	$("#invoice_datepicker, #patrimonial_status_datepicker").datepicker(
	  		{
		        yearRange: '1920:'+(new Date).getFullYear(),
		        maxDate: "today()"
		    }
    	);

    	$("#depreciation_datepicker_start").datepicker(
	  		{
		        yearRange: '1960:'+(new Date).getFullYear()
		    }
    	);

    	$("#purchase_value, #residual_value").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '.',
		    limit: false,
		    centsLimit: 2,
		    clearPrefix: false,
		    allowNegative: false
  		});
	</script>
@endsection