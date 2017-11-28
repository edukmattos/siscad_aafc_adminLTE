@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="{!! route('materials') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Materiais</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'materials.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('materials.form')

	{!! Form::close() !!}

@endsection
