@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Acessibilidade</li>
  		<li class="breadcrumb-item"><a href="{!! route('users') !!}">Usuários</a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('users.edit_form')

	{!! Form::close() !!}
	    
@endsection