@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item"><a href="{!! route('patrimonial_types') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Tipos</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'patrimonial_types.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_types.form')

	{!! Form::close() !!}

@endsection