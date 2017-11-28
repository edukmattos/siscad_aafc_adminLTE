@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Empresa</li>
  		<li class="breadcrumb-item"><a href="{!! route('company_positions') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Cargos</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'company_positions.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('company_positions.form')

	{!! Form::close() !!}

@endsection
