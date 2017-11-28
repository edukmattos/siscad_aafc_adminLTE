@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Empresa</li>
  		<li class="breadcrumb-item"><a href="{!! route('company_sub_sectors') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Sub-setores</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'company_sub_sectors.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('company_sub_sectors.form')

	{!! Form::close() !!}

@endsection
