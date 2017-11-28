@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{!! route('materials') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Materiais</b></a></li>
      <li class="breadcrumb-item"><b>CONSULTA</b></li>

      <div class="btn-group btn-group-sm pull-right">
      <a href="{!! route('materials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('materials.edit', ['id' => $material->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('materials') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>

  <div class="col-sm-8">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">
          <b>{{ $material->code }} - {{ $material->description }}</b>
        </h3>
        <span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Código</td>
                <td class="text-left">{{ $material->code }}</td>
              </tr>

              <tr>
                <td class="text-right">Descrição</td>
                <td class="text-left">{{ $material->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Unidade</td>
                <td class="text-left">{{ $material->material_unit->code }} ({{ $material->material_unit->description }})</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12">
    @include('materials.patrimonials')
  </div>
    
@endsection

@section('js_scripts')
  <script type="text/javascript">
    $(document).on('click', '.panel-heading span.panel-clickable', function(e)
      {
          var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) 
          {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
          } 
        else 
          {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
          }
      })
  </script>
@endsection
  