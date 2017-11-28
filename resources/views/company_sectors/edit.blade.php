@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Empresa</li>
  		<li class="breadcrumb-item"><a href="{!! route('company_sectors') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Setores</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($company_sector, ['route' => ['company_sectors.update', $company_sector->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('company_sectors.form')

	{!! Form::close() !!}
	    
@endsection