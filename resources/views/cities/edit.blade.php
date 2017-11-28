@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Localidades</li>
  		<li class="breadcrumb-item"><a href="{!! route('cities') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Cidades</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($city, ['route' => ['cities.update', $city->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('cities.form')

	{!! Form::close() !!}
	    
@endsection