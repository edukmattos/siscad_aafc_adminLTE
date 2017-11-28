@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item"><a href="{!! route('patrimonial_brands') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Marcas</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($patrimonial_brand, ['route' => ['patrimonial_brands.update', $patrimonial_brand->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_brands.form')

	{!! Form::close() !!}
	    
@endsection