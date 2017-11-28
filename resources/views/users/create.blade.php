@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Acessibilidade</li>
  		<li class="breadcrumb-item"><a href="{!! route('users') !!}">Usuários</a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::open(['route' => 'users.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('users.form')

	{!! Form::close() !!}

@endsection