@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Patrimônios</li>
    <li class="breadcrumb-item">Requisições</li>
    <li class="breadcrumb-item"><b>CONSULTA</b></li>

    <div class="btn-group btn-group-sm pull-right">
      <a href="{!! route('patrimonial_requests.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
      @if($patrimonial_request->patrimonial_request_status_id == '1')
        
        @if($patrimonial_request_items->count()>=1)
          |
          <a href="{!! route('patrimonial_requests.close', [$patrimonial_request->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Encerrar"><i class="fa fa-thumbs-o-up"></i></a>
        @endif
        |
        <a href="{!! route('patrimonial_requests.destroy', [$patrimonial_request->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Cancelar"><i class="fa fa-thumbs-o-down"></i></a>
      
      @endif

      @if($patrimonial_request->patrimonial_request_status_id == '2')
        |
        <a href="{!! route('patrimonial_requests.report', [$patrimonial_request->id]) !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Imprimir"><i class="fa fa-print"></i></a>
        |
        <a href="{!! route('patrimonial_requests.destroy', [$patrimonial_request->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Cancelar"><i class="fa fa-thumbs-o-down"></i></a>
      @endif
    </div>
  </ol>

  <div class="col-sm-8">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{ $patrimonial_request->id }}</b></h3>
        <span class="pull-right"><b>Situação: {{ $patrimonial_request->patrimonial_request_status->description }}</b></span>
      </div>
      <div class="panel-body">
        ORIGEM
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Responsável</td>
                <td class="text-left">{{ $patrimonial_request->from_employee->name }}</td>
              </tr>

            </tbody>
          </table>
        </div>

        DESTINO
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Unid.Gestora</td>
                <td class="text-left">{{ $patrimonial_request->to_management_unit->code }} - {{ $patrimonial_request->to_management_unit->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Setor</td>
                <td class="text-left">{{ $patrimonial_request->to_company_sector->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Sub-setor</td>
                <td class="text-left">{{ $patrimonial_request->to_company_sub_sector->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Responsável</td>
                <td class="text-left">{{ $patrimonial_request->to_employee->name }}</td>
              </tr>

              <tr>
                <td class="text-right">Situação</td>
                <td class="text-left">{{ $patrimonial_request->to_patrimonial_status->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Justificativa</td>
                <td class="text-left">{{ $patrimonial_request->comments }}</td>
              </tr>

              @if($patrimonial_request->patrimonial_request_status_id == '3')
                <tr>
                  <td class="text-right">Data Movimentação</td>
                  <td class="text-left">
                    @if($patrimonial_request->to_patrimonial_status_date!=null)
                      {{ $patrimonial_request->to_patrimonial_status_date->format('d/m/Y') }}
                    @endif
                  </td>
                </tr>
              @endif

            </tbody>
          </table>
        </div>

        @if($patrimonial_request->patrimonial_request_status_id == '2')
          
          {!! Form::model($patrimonial_request, ['route' => ['patrimonial_requests.confirm', $patrimonial_request->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

            <div class="form-group {{ $errors->has('to_patrimonial_status_date') ? 'has-error' : '' }}">
              <label for="to_patrimonial_status_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data Movimentação:</label>
              <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <div class="input-group input-group-sm date">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    {!! Form::text('to_patrimonial_status_date', isset($patrimonial_request->to_patrimonial_status_date) ? $patrimonial_request->to_patrimonial_status_date->format('d/m/Y') : null, ['id'=>'to_patrimonial_status_datepicker', 'class'=>'form-control']) !!}
                </div>
              </div>
              <button type="submit" class="btn btn-sm btn-success">Confirmar <i class="fa fa-check"></i></button>
            </div>

          {!! Form::close() !!}
        @endif
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    @include('revisionable.logs_register')
  </div>

  <div class="col-sm-12">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>PATRIMÔNIOS</b></h3>
      </div>
      <div class="panel-body">
        @if($patrimonial_request->patrimonial_request_status_id == 1)
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
              <thead>
                <tr>
                  <th data-width="1%" class="text-center">
                    #
                  </th>
                  <th data-field="code" data-sortable="true" data-align="right">Código</th>
                  <th data-field="description" data-sortable="true">Descrição</th>
                  <th data-field="management_unit_id" data-sortable="true">Unid.Gestora</th>
                  <th data-field="company_sector_id" data-sortable="true">Setor</th>
                  <th data-field="company_sub_sector_id" data-sortable="true">Sub-setor</th>
                  <th data-field="patrimonial_status_id" data-align="left">Situação</th>
                  <th data-field="patrimonial_status_date" data-align="left">Data</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employee_patrimonials as $patrimonial)
                  <tr>
                    <td>
                      @if($patrimonial_request_items_lookup->contains('patrimonial_id', $patrimonial->id))
                        <a href="{!! route('patrimonial_requests.removeItem', [$patrimonial_request->id, $patrimonial->id]) !!}" type="button" class="round round-sm hollow red"><i class="fa fa-trash"></i></a>
                      @else
                        <a href="{!! route('patrimonial_requests.addItem', [$patrimonial_request->id, $patrimonial->id]) !!}" type="button" class="round round-sm hollow green"><i class="fa fa-plus"></i></a>
                      @endif
                    </td>
                    <td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{{ $patrimonial->code }}</a></td>
                    <td>{{ $patrimonial->description }}</td>
                    <td>{{ $patrimonial->management_unit->code }}</td>
                    <td>{{ $patrimonial->company_sector->description }}</td>
                    <td>{{ $patrimonial->company_sub_sector->description }}</td>
                    <td>{{ $patrimonial->patrimonial_status->description }}</td>
                    <td>{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif

        @if(($patrimonial_request->patrimonial_request_status_id == 3) || ($patrimonial_request->patrimonial_request_status_id == 2)  || ($patrimonial_request->patrimonial_request_status_id == 4))
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
              <thead>
                <tr>
                  <th data-width="1%" data-align="center">#</th>
                  <th data-field="code" data-sortable="true" data-align="right">Código</th>
                  <th data-field="description" data-sortable="true">Descrição</th>                
                  <th data-field="management_unit_id" data-sortable="true">Unid.Gestora</th>
                  <th data-field="company_sector_id" data-sortable="true">Setor</th>
                  <th data-field="company_sub_sector_id" data-sortable="true">Sub-setor</th>
                  <th data-field="patrimonial_status_id" data-align="left">Situação</th>
                  <th data-field="patrimonial_status_date" data-align="left">Data</th>
                </tr>
              </thead>
              <tbody>
                @foreach($patrimonial_request_items as $patrimonial_request_item)
                  <tr>
                    <td>
                      @if($patrimonial_request_items_lookup->contains('patrimonial_id', $patrimonial_request_item->patrimonial_id))
                        @if(!$patrimonial_request_item->to_patrimonial_status_date)
                          <a href="{!! route('patrimonial_requests.removeItem', [$patrimonial_request->id, $patrimonial_request_item->patrimonial_id]) !!}" type="button" class="round round-sm hollow red"><i class="fa fa-trash"></i></a>
                        @else
                          <i class="fa fa-check-square-o"></i>
                        @endif
                      @endif
                    </td>
                    <td><a href="{!! route('patrimonials.show', [$patrimonial_request_item->patrimonial_id]) !!}">{{ $patrimonial_request_item->patrimonial->code }}</a></td>
                    <td>{{ $patrimonial_request_item->patrimonial->description }}</td> 
                    <td>{{ $patrimonial_request_item->from_management_unit->code }}</td>
                    <td>{{ $patrimonial_request_item->from_company_sector->description }}</td>
                    <td>{{ $patrimonial_request_item->from_company_sub_sector->description }}</td>
                    <td>{{ $patrimonial_request_item->from_patrimonial_status->description }}</td> 
                    <td>
                      @if($patrimonial_request_item->from_patrimonial_status_date!=null)
                        {{ $patrimonial_request_item->from_patrimonial_status_date->format('d/m/Y') }}
                      @endif
                    </td>                 
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>
    
@endsection

@section('js_scripts')
  <script type="text/javascript">
    $("#to_patrimonial_status_datepicker").datepicker(
      {
        maxDate: "today()"
      }
    );
  </script>
@endsection
