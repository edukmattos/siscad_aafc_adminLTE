<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">
			<b>PATRIMÔNIOS</b>
		</h3>
			
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_employee_movements" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-width="1%" data-align="center">
							@if($employee->employee_status_id=='2')
					          	<a href="{!! route('employees.start_movement', ['id' => $employee->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Entrada"><i class="fa fa-file-o"></i></a> 
				        	@else
				        		#
				        	@endif
				        </th>
        				<th data-field="company_position_id">Cargo</th>
						<th data-field="company_responsibility_id">Função</th>
						<th data-field="management_unit_id">Unid.Gestora</th>
						<th data-field="employee_sector_id">Setor</th>
						<th data-field="employee_sub_sector_id">Sub-setor</th>
						<th data-align="center" data-field="employee_status_date">Entrada</th>
						<th data-align="center" data-field="employee_status_is">Saída</th>
						<th data-align="center">Duração</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($employee_movements as $employee_movement)
						<tr>
							<td>
								<a href="{!! route('employees.edit_movement', ['id' => $employee_movement->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
							</td>
							<td>{{ $employee_movement->company_position->description }}</td>
							<td>{{ $employee_movement->company_responsibility->description }}</td>
							<td><a href="{!! route('management_units.show', [$employee_movement->management_unit_id]) !!}">{{ $employee_movement->management_unit->code }}</a></td>
							<td>{{ $employee_movement->company_sector->description }}</td>
							<td>{{ $employee_movement->company_sub_sector->description }}</td>
							<td>{{ $employee_movement->date_start->format('d/m/Y') }}</td>
							<td>
								@if($employee_movement->date_end==Null)
					          		<a href="{!! route('employees.end_movement_edit', ['id' => $employee_movement->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Saída"><i class="fa fa-file-o"></i></a> 
					        	@else
					        		{{ $employee_movement->date_end->format('d/m/Y') }}
					        	@endif
							</td>
							<td>
								@if($employee_movement->date_end!=Null)
					          		{{ $employee_movement->date_start->diff($employee_movement->date_end)->format('%y anos, %m meses e %d dias') }} 
					        	@else
					        		{{ $employee_movement->date_start->diff(\Carbon\Carbon::now())->format('%y anos, %m meses e %d dias') }} 
					        	@endif
							</td>
						</tr>
					@endforeach
				</tbody>
		</table>
		</div>
	</div>
</div>
