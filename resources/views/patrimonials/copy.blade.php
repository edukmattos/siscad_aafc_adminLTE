@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="{!! route('patrimonials.search_results_back') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Patrimônios</b></a></li>
  		<li class="breadcrumb-item"><b>CÓPIA</b></li>

  		<div class="btn-group btn-group-sm pull-right">
			<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a> 
	        <a href="{!! route('patrimonials.search') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
	    </div>
	</ol>

	{!! Form::model($patrimonial, ['route' => ['patrimonials.store', $patrimonial->id], 'method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.form')

	{!! Form::close() !!}
	    
@endsection