<div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"> 
          <b>{{ $patrimonial->description }}</b>
        </h3>
        <span class="pull-right clickable"><i class="fa fa-chevron-up"></i></span>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Código</td>
                <td class="text-left">{{ $patrimonial->code }}</td>
              </tr>

              <tr>
                <td class="text-right">Tipo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_type->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Sub-tipo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_sub_type->description }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Modelo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_model->description }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Marca</td>
                <td class="text-left">{{ $patrimonial->patrimonial_brand->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Série</td>
                <td class="text-left">{{ $patrimonial->serial }}</td>
              </tr>

              <tr>
                <td class="text-right">Unid.Gestora</td>
                <td class="text-left">{{ $patrimonial->management_unit->code }} - {{ $patrimonial->management_unit->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Setor</td>
                <td class="text-left">{{ $patrimonial->company_sector->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Sub-setor</td>
                <td class="text-left">{{ $patrimonial->company_sub_sector->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Responsável</td>
                <td class="text-left"><a href="{!! route('employees.show', [$patrimonial->employee_id]) !!}">{{ $patrimonial->employee->name }}</a></td>
              </tr>

              <tr>
                <td class="text-right">Situação</td>
                <td class="text-left">{{ $patrimonial->patrimonial_status->description }} desde {{ $patrimonial->patrimonial_status_date->format('d/m/Y') }} ({{ $patrimonial->patrimonial_status_date->diffForHumans() }})</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $patrimonial->comments }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>