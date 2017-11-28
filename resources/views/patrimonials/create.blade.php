@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item"><a href="{!! route('patrimonials.search') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Pesquisa</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'patrimonials.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.form')

	{!! Form::close() !!}

@endsection
