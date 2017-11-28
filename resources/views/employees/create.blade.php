@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="{!! route('employees.search_results_back') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Funcionários</b></a></li>
    	<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
  	</ol>

	{!! Form::open(['route' => 'employees.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    <?php $form_method = "post"; ?>

	    @include('employees.form')

	{!! Form::close() !!}

@endsection
