@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Localidades</li>
  		<li class="breadcrumb-item"><a href="{!! route('regions') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Regiões</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($region, ['route' => ['regions.update', $region->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('regions.form')

	{!! Form::close() !!}
	    
@endsection