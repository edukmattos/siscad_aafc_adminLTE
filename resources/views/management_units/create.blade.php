@extends('adminlte::page')

@section('content_header')
    <h1>UNIDADES GESTORAS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
	    	<a href="{!! route('management_units') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
		</div>
	</ol>
@stop

@section('content')
   	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
  						<h3 class="box-title">INCLUSÃO</h3>
			        </div>
					
					{!! Form::open(['route' => 'management_units.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

						<div class="box-body">
						
		    				<?php $form_method = "post"; ?>

		    				@include('management_units.form')
						</div>

						<div class="box-footer">
						    <label for="submit_buttons" class="col-sm-2 control-label"></label>
						    <button type="submit" class="btn btn-flat btn-success">Confirmar <i class="fa fa-check"></i></button>
						    <a href="{{ URL::previous() }}" class="btn btn-flat btn-danger">Cancelar <i class="fa fa-times"></i></a>
						</div>
						
					{!! Form::close() !!}
				</div>
			</div>
	</div>
@endsection