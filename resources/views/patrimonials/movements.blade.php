<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">
			<b>MOVIMENTAÇÕES</b>
		</h3>
			<span class="pull-right clickable"><i class="fa fa-chevron-down"></i></span>
	</div>
	<div class="panel-body" style="display:none;">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_patrimonial_movements" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-field="management_unit_id">Unid.Gestora</th>
						<th data-field="company_sector_id">Setor</th>
						<th data-field="company_sub_sector_id">Sub-setor</th>
						<th data-field="employee_id">Responsável</th>
						<th data-field="patrimonial_status_id">Situação</th>
						<th data-field="date_start">Data Início</th>
						<th data-field="date_end">Data Fim</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($patrimonial_movements as $patrimonial_movement)
						<tr>
							<td>{{ $patrimonial->management_unit->code }} - {{ $patrimonial_movement->management_unit->description }}</td>
							<td>{{ $patrimonial_movement->company_sector->description }}</td>
							<td>{{ $patrimonial_movement->company_sub_sector->description }}</td>
							<td>{{ $patrimonial_movement->employee->name }}</td>
							<td>{{ $patrimonial_movement->patrimonial_status->description }}</td>
							<td>{{ $patrimonial_movement->date_start->format('d/m/Y') }}</td>
							<td>
								@if($patrimonial_movement->date_end)
                    				{{ $patrimonial_movement->date_end->format('d/m/Y') }}
                  				@endif
							</td>
						</tr>
					@endforeach
				</tbody>
		</table>
		</div>
	</div>
</div>
