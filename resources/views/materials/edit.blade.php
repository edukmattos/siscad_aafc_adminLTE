@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="{!! route('materials') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Materiais</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($material, ['route' => ['materials.update', $material->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('materials.form')

	{!! Form::close() !!}
	    
@endsection