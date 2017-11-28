@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Empresa</li>
  		<li class="breadcrumb-item"><a href="{!! route('company_responsibilities') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Funções</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($company_responsibility, ['route' => ['company_responsibilities.update', $company_responsibility->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('company_responsibilities.form')

	{!! Form::close() !!}
	    
@endsection