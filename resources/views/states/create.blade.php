@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Localidades</li>
  		<li class="breadcrumb-item"><a href="{!! route('states') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Estados</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'states.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('states.form')

	{!! Form::close() !!}

@endsection
