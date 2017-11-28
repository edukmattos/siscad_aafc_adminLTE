@extends('adminlte::page')

@section('content_header')
  <h1>EVENTOS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('meetings.edit', ['id' => $meeting->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('meetings.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('meetings') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="{!! route('meetings.attendance_list_reports', ['id' => $meeting->id]) !!}" type="button" class="btn btn-sm btn-default" rel="tooltip" title="Lista Presença"><i class="fa fa-print"></i></a>

      <a href="javascript:;" onclick="onDestroy('{!! route('meetings.destroy', ['id' => $meeting->id]) !!}')" id="link_delete" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>
@stop

@section('content')
  <!-- Main content -->
  @if($meeting->deleted_at)
    @include('common.trashed')
  @endif
  
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $meeting->id }} - {{ $meeting->description }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  
                </thead>
                <tbody>
                  <tr>
                    <td class="text-right" width="25%">Data</td>
                    <td class="text-left">{{ $meeting->date->format('d/m/Y') }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Tipo</td>
                    <td class="text-left">{{ $meeting->meeting_type->description }}</td>
                  </tr>
                  
                  <tr>
                    <td class="text-right">Cidade/UF</td>
                    <td class="text-left">{{ $meeting->city->description }}/{{ $meeting->city->state->code }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Região</td>
                    <td class="text-left">{{ $meeting->city->region->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Previsão Participantes</td>
                    <td class="text-left">{{ $meeting->participants_estimated_qty }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Participantes Confirmados</td>
                    <td class="text-left">{{ $meeting->participants_confirmed_qty }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">R$ Reembolso</td>
                    <td class="text-left">{{ number_format($meeting->participants_refunds_amount, 2,",",".") }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        @include('revisionable.logs_register')
      </div>
    </div>
  </section>    
@endsection
  