@extends('adminlte::page')

@section('content_header')
    <h1>FORNECEDORES</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('providers.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display" cellspacing="0" width="100%" id="table_providers"> 
							<thead>
								<tr>
									<th>CNPJ</th>
									<th>Descrição</th>
									<th>Endereço</th>
									<th>Bairro</th>
									<th>Cidade/UF</th>
									<th>CEP</th>
									<th>Fone</th>
									<th>Celular</th>
									<th>e-mail</th>
									<th>Obs</th>		
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>CNPJ</th>
									<th>Descrição</th>
									<th>Endereço</th>
									<th>Bairro</th>
									<th>Cidade/UF</th>
									<th>CEP</th>
									<th>Fone</th>
									<th>Celular</th>
									<th>e-mail</th>
									<th>Obs</th>		
								</tr>
							</tfoot>
							<tbody>
							    @foreach($providers as $provider)
							        <tr>
							            <td><a href="{!! route('providers.show', [$provider->id]) !!}">{!! $provider->cnpj_mask !!}</a></td>
							            <td>{{ $provider->description }}</td>
							            <td>{{ $provider->address }}</td>
							            <td>{{ $provider->neighborhood }}</td>
							            <td>{{ $provider->city->description }}/{{ $provider->city->state->code }}</td>
							            <td>{{ $provider->zip_code_mask }}</td>
							            <td>{{ $provider->phone_mask }}</td>
									    <td>{{ $provider->mobile_mask }}</td>
									    <td>{{ $provider->email }}</td>
									    <td>{{ $provider->comments }}</td>
							        </tr>
							    @endforeach
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</th>
	</section>
@endsection

@section('js')
	<script type="text/javascript">
	  	$(document).ready(function() 
		{
    		$('#table_providers').DataTable( 
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