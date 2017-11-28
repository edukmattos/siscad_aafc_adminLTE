@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Localidades</li>
  		<li class="breadcrumb-item"><a href="{!! route('cities') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Cidades</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>
	
	{!! Form::open(['route' => 'cities.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('cities.form')

	{!! Form::close() !!}

@endsection
