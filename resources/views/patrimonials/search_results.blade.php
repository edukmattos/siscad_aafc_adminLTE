@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item"><a href="{!! route('patrimonials.search') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Pesquisa</b></a></li>
  		<div class="btn-group btn-group-sm pull-right">
        	<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    </div>
	</ol>

	<div class="table-responsive">
       	<table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i>
							</a>
					</th>
					<th data-field="code" data-sortable="true" data-align="right">Código</th>
					<th data-field="patrimonial_type_id" data-sortable="true">Tipo</th>
					<th data-field="patrimonial_sub_type_id" data-sortable="true">Sub-tipo</th>
					<th data-field="description" data-sortable="true">Descrição</th>
					<th data-field="management_unit_id" data-sortable="true">Unid.Gestora</th>
					<th data-field="company_sector_id" data-sortable="true">Setor</th>
					<th data-field="company_sub_sector_id" data-sortable="true">Sub-setor</th>
					<th data-field="patrimonial_status_id" data-align="left">Situação</th>
					<th data-field="patrimonial_status_date">Dt Situação</th>
					<th data-field="employee_id">Responsável</th>
					<th data-field="purchase_process" data-sortable="false">Proc.Compra</th>
					<th data-field="accounting_account_id" data-sortable="true">Conta contábil</th>
					<th data-field="provider_id" data-sortable="true">Fornecedor</th>
					<th data-field="invoice_date" data-sortable="false" data-align="right">Dt.Compra</th>
					<th data-field="invoice" data-sortable="true" data-align="right">NF</th>
					<th data-field="purchase_value" data-sortable="false" data-align="right">R$ Total</th>
					<th data-field="residual_value" data-sortable="false" data-align="right">R$ Residual</th>
					<th data-field="residual_value1" data-sortable="false" data-align="right">R$ Depreciar</th>
					<th data-field="depreciation_date_start" data-sortable="true" data-align="right">Deprec Ini</th>
					<th data-field="purchase_value1" data-sortable="false" data-align="right">Deprec R$/Mês</th>						
					<th data-field="depreciation_value2" data-align="right">Deprec Acumul Meses</th>
					<th data-field="depreciation_value3" data-align="right">
						Deprec Acumul R$
						<br>
						até {{ $srch_depreciation_date_BR }}
					</th>
					<th data-field="comments">Obs</th>
				</tr>
			</thead>
			<tbody>
			    @foreach($patrimonials as $patrimonial)
			        <tr>
			            <td>
			            	@if($patrimonial->patrimonial_status_id!=5)
			            	    <a href="{!! route('patrimonials.edit', [$patrimonial->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            	@endif
			            </td>
			            <td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{{ $patrimonial->code }}</a></td>
			            <td>{{ $patrimonial->patrimonial_type->code }}</td>
			            <td>{{ $patrimonial->patrimonial_sub_type->code }}</td>
			            <td>{{ $patrimonial->description }}</td>
			           	<td><a href="{!! route('management_units.show', [$patrimonial->management_unit_id]) !!}" title="{{ $patrimonial->management_unit->description }}">{{ $patrimonial->management_unit->code }}</a></td>
			            <td>{{ $patrimonial->company_sector->description }}</td>
			            <td>{{ $patrimonial->company_sub_sector->description }}</td>
			            <td>{{ $patrimonial->patrimonial_status->description }}</td>
			            <td>{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
			            <td>{{ $patrimonial->employee->name }}</td>
			            <td>{{ $patrimonial->purchase_process }}</td>
			            <td>{{ $patrimonial->patrimonial_type->asset_accounting_account->code }}</td>
			            <td><a href="{!! route('providers.show', [$patrimonial->provider_id]) !!}" title="{{ $patrimonial->provider->description_short }}">{{ $patrimonial->provider->cnpj_mask }}</a></td>
			            <td>{{ $patrimonial->invoice_date->format('d/m/Y') }}</td>
			            <td>{{ $patrimonial->invoice }}</td>
			            <td>{{ number_format(($patrimonial->purchase_value + $patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices()), 2,",",".") }}</td>

			            <td>{{ number_format(($patrimonial->residual_value), 2,",",".") }}</td>

			            <td>{{ number_format(($patrimonial->purchase_value + $patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices() - $patrimonial->residual_value), 2,",",".") }}</td>

			            <td>{{ $patrimonial->depreciation_date_start->format('d/m/Y') }}</td>
			            <td>{{ number_format($patrimonial->getDepreciationMonthlyValue(), 2,",",".") }}</td>
			            <td>{{ $patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN) }}</td>
			            <td>
			            	@if($patrimonial->patrimonial_type->useful_life_years > '0')
				            	@if($patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN) == $patrimonial->getUsefulLifeMonthsQty())
				            		{{ number_format(($patrimonial->purchase_value + $patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices() - $patrimonial->residual_value), 2,",",".") }}
				            	@else
				            		{{ number_format($patrimonial->getDepreciationMonthlyValue() * $patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN), '2', ',', '.') }}
				            	@endif
				            @endif
			            </td>
				         	
			            <td>{{ $patrimonial->comments }}</td>
			        </tr>
			        <?php 
			        	#$patrimonial_total_value += $patrimonial->purchase_value + $patrimonial->getTotalMaterials() + $patrimonial->getTotalServices();
			        ?>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection