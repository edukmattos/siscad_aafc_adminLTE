@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Materiais</li>
  		<li class="breadcrumb-item"><a href="{!! route('material_units') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Unidades</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'material_units.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('material_units.form')

	{!! Form::close() !!}

@endsection
