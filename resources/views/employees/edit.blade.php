@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="{!! route('employees.search_results_back') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Funcionários</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    <?php $form_method = "put"; ?>

	    @include('employees.edit_form')

	{!! Form::close() !!}
	    
@endsection