@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  	<li class="breadcrumb-item">Funcionários</li>
   	<li class="breadcrumb-item"><b>PESQUISA</b></li>

   	<div class="btn-group btn-group-sm pull-right">
   		<a href="{!! route('employees.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
   	</div>
  </ol>

	{!! Form::open(['route' => 'employees.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('employees.search_form')

	{!! Form::close() !!}

@endsection