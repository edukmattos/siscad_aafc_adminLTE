@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
      <li class="breadcrumb-item">Administração</li>
      <li class="breadcrumb-item">Localidades</li>
      <li class="breadcrumb-item"><a href="{!! route('regions') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Regiões</b></a></li>
      <li class="breadcrumb-item"><b>CONSULTA</b></li>
  </ol>

  <div class="row">
   	<div class="col-sm-8">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">
            <b>{{ $region->description }}</b>
          </h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                
              </thead>
              <tbody>
                <tr>
                  <td class="text-right" width="25%">Código</td>
                  <td class="text-left">{{ $region->code }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

   	<div class="col-sm-4">
    	@include('regions.cities')
    </div>
  </div>
	    
@endsection
  