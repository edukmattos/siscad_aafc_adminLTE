@extends('adminlte::page')

@section('content_header')
    <h1>PARCEIROS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('partners.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    	<a href="{!! route('partners.search') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
	    	<a href="{!! route('dashboard.pc_partners') !!}" type="button" class="btn btn-sm btn-warning" rel="tooltip" title="PC Parceiros"><i class="fa fa-dashboard"></i></a>
		</div>
	</ol>
@stop


@section('content')
<!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <div class="box-body"><!-- Main content -->
          				<table class="display" cellspacing="0" width="100%" id="table_partners">
    						<thead>
								<tr>
									<th>Região</th>
									<th>Cidade/UF</th>
									<th>Tipo</th>
									<th>Setor</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>Bairro</th>	
									<th>CEP</th>
									<th>e-mail</th>
									<th>Fone</th>	
									<th>Celular</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>Região</th>
									<th>Cidade/UF</th>
									<th>Tipo</th>
									<th>Setor</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>Bairro</th>	
									<th>CEP</th>
									<th>e-mail</th>
									<th>Fone</th>	
									<th>Celular</th>
								</tr>
							</tfoot>

							<tbody>
								@foreach($partners as $partner)
							        <tr>
							        	<td>{{ $partner->city->region->description }}</td>
							        	<td>{{ $partner->city->description }}/{{ $partner->city->state->code }}</td>
							        	<td>{{ $partner->partner_type->description }}</td>
							        	<td>{{ $partner->partner_sector->description }}</td>
							        	<td><a href="{!! route('partners.show', ['id' => $partner->id]) !!}">{{ $partner->name }}</a></td></td>
							        	<td>{{ $partner->address }}</td>
							        	<td>{{ $partner->neighborhood }}</td>
							        	<td>{{ $partner->zip_code_mask }}</td>
							        	<td>{{ $partner->email }}</td>
							        	<td>{{ $partner->phone_mask }}</td>
							        	<td>{{ $partner->mobile_mask }}</td>
							        </tr>
							    @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript">
	  	$(document).ready(function() 
		{
    		$('#table_partners').DataTable( 
    		{
                responsive: true,
                dom: 'Bfrtip',
		        buttons: [
		            'copy', 'csv', 'excel', 'pdf', 'print'
		        ],
		        language: {
            		"lengthMenu": "Display _MENU_ records per page",
            		"zeroRecords": "Ops ... Nenhum REGISTRO localizado !",
            		"info": "Showing page _PAGE_ of _PAGES_",
            		"infoEmpty": "No records available",
            		"infoFiltered": "(filtered from _MAX_ total records)"
        		}
    		});
		});	
	</script>
@endsection