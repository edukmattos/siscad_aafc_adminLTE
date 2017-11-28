@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Parceiros</li>
  		<li class="breadcrumb-item"><a href="{!! route('partner_sectors') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Setores</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($partner_sector, ['route' => ['partner_sectors.update', $partner_sector->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('partner_sectors.form')

	{!! Form::close() !!}
	    
@endsection