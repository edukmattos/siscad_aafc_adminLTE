<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">
			<b>MATERIAIS</b>
		</h3>
			<span class="pull-right clickable"><i class="fa fa-chevron-down"></i></span>
	</div>
	<div class="panel-body" style="display:none;">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_patrimonial_materials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-width="1%" data-align="center">
							@if($patrimonial->patrimonial_status_id!=5)
					          	<a href="{!! route('patrimonial_materials.create', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>  
				        	@endif
						</th>
						<th data-width="1%" data-align="right">Lanc</th>
						<th data-width="1%" data-align="center">Tipo</th>
						<th data-width="1%" data-align="left" data-field="date">Data Interv</th>
						<th data-width="1%" data-align="right" data-field="code">Código</th>
						<th data-align="left" data-field="material_id">Descrição</th>
						<th data-width="10%" data-align="right" data-field="purchase_qty">Qte</th>
						<th data-width="12%" data-align="left" data-field="provider_id">Fornecedor</th>
						<th data-width="1%" data-align="right" data-field="invoice_date">Data Nota Fiscal</th>
						<th data-width="10%" data-align="right" data-field="invoice">Nota Fiscal</th>
						<th data-width="1%" data-align="right" data-field="purchase_value">Valor Compra</th>
						<th data-width="1%" data-align="center">#</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($patrimonial_materials as $patrimonial_material)
						<tr>
							<td>
								@if($patrimonial->patrimonial_status_id!=5)
           							<a href="{!! route('patrimonial_materials.edit', [$patrimonial_material->id]) !!}"type="button" class="round round-sm hollow blue" rel="tooltip" title="Alterar"><i class="fa fa-edit"></i></a>
          						@endif
       						</td>
							<td>{{ $patrimonial_material->id }}</td>
							<td>{{ $patrimonial_material->patrimonial_intervention_type->code }}</td>
							<td>{{ $patrimonial_material->intervention_date->format('d/m/Y') }}</td>
							<td><a href="{!! route('materials.show', [$patrimonial_material->material_id]) !!}">{{ $patrimonial_material->material->code }}</a></td>
							<td>{{ $patrimonial_material->material->description }}</td>
							<td>{{ number_format($patrimonial_material->purchase_qty, 2,",",".") }} {{ $patrimonial_material->material->material_unit->code }}</td>
							<td><a href="{!! route('providers.show', [$patrimonial_material->provider_id]) !!}">{{ $patrimonial_material->provider->cnpj_mask }}</a></td>
							<td>{{ $patrimonial_material->invoice_date->format('d/m/Y') }}</td>
							<td>{{ $patrimonial_material->invoice }}</td>
							<td>R$ {{ number_format($patrimonial_material->purchase_value, 2,",",".") }}</td>
							<td>
								@if($patrimonial->patrimonial_status_id!=5)
           							<a href="{!! route('patrimonial_materials.edit', [$patrimonial_material->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
          						@endif 
							</td>							
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th class="text-right" colspan="10">Total</th>
						<th class="text-right">R$ {{ number_format($total_materials, 2,",",".") }}</th>
					</tr>
				</tfoot>
		</table>
		</div>
	</div>
</div>