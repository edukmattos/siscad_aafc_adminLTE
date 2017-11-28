@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Patrimônios</li>
		<li class="breadcrumb-item">Requisições</li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'patrimonial_requests.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_requests.form')

	{!! Form::close() !!}

@endsection
