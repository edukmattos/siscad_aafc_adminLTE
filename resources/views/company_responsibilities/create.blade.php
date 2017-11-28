@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Empresa</li>
  		<li class="breadcrumb-item"><a href="{!! route('company_responsibilities') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Funções</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'company_responsibilities.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('company_responsibilities.form')

	{!! Form::close() !!}

@endsection
