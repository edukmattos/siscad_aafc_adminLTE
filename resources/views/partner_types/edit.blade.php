@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Parceiros</li>
  		<li class="breadcrumb-item"><a href="{!! route('partner_types') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Tipos</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::model($partner_type, ['route' => ['partner_types.update', $partner_type->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('partner_types.form')

	{!! Form::close() !!}
	    
@endsection