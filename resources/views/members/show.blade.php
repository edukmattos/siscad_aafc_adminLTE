@extends('adminlte::page')

@section('content_header')
  <h1>SÓCIOS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('members.edit', ['id' => $member->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('members.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('members.search_results_back') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="{!! route('members.destroy', ['id' => $member->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
      <a href="{!! route('dashboard.pc_members') !!}" type="button" class="btn btn-sm btn-warning" rel="tooltip" title="PC Sócios"><i class="fa fa-dashboard"></i></a>
    </div>
  </ol>
@stop

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $member->name }}</h3>
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
                    <td class="text-right" width="25%">Matrícula</td>
                    <td class="text-left">{{ $member->code }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">CPF</td>
                    <td class="text-left">{{ $member->cpf_mask }}</td>
                  </tr>
                  
                  <tr>
                    <td class="text-right">Plano</td>
                    <td class="text-left">{{ $member->plan->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Situação</td>
                    <td class="text-left">{{ $member->member_status->description }}
                      @if($member->member_status_id=='1')
                        por {{ $member->member_status_reason->description }} {{ $member->date_aafc_fim->diffForHumans() }} (desde {{ $member->date_aafc_fim->format('d/m/Y') }})
                      @endif

                      @if($member->member_status_id=='2')
                        {{ $member->date_aafc_ini->diffForHumans() }} (desde {{ $member->date_aafc_ini->format('d/m/Y') }}) 
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td class="text-right">Nascimento</td>
                    <td class="text-left">
                      @if($member->birthday!=null)
                        {{ $member->birthday->format('d/m/Y') }} ({{ $member->birthday->age }} anos)
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td class="text-right">Endereço</td>
                    <td class="text-left">{{ $member->address }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Bairro</td>
                    <td class="text-left">{{ $member->neighborhood }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Cidade</td>
                    <td class="text-left">{{ $member->city->description }} / {{ $member->city->state->code }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">CEP</td>
                    <td class="text-left">{{ $member->zip_code_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Região</td>
                    <td class="text-left">{{ $member->city->region->description }} ({{ $member->city->region->code }})</td>
                  </tr>

                  <tr>
                    <td class="text-right">Telefone</td>
                    <td class="text-left">{{ $member->phone_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Celular</td>
                    <td class="text-left">{{ $member->mobile_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Observações</td>
                    <td class="text-left">{{ $member->comments }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        @include('members.payments')
        @include('revisionable.logs_register')
      </div>
    </div>
  </section>    
@endsection
  