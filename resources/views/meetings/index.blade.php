@extends('adminlte::page')

@section('content_header')
    <h1>EVENTOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('meetings.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display" cellspacing="0" width="100%" id="table_meetings"> 
							<thead>
								<tr>
									<th>ID</th>
									<th>Data</th>
									<th>Tipo</th>
									<th>Cidade/UF</th>	
									<th>Região</th>
									<th>Descrição</th>
									<th>Partic Prev</th>
									<th>Partic Confirm</th>
									<th>R$ Reembolso</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>ID</th>
									<th>Data</th>
									<th>Tipo</th>
									<th>Cidade/UF</th>	
									<th>Região</th>
									<th>Descrição</th>
									<th>Partic Prev</th>
									<th>Partic Confirm</th>
									<th>R$ Reembolso</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($meetings as $meeting)
							        <tr>
							        	<td><a href="{!! route('meetings.show', ['id' => $meeting->id]) !!}">{{ $meeting->id }}</a></td>
							        	<td>
							        		@if($meeting->date!=null)
				            	       			{{ $meeting->date->format('d/m/Y') }}
				               				@endif
				                  		</td>
								       	<td>{{ $meeting->meeting_type->description }}</td>
								       	<td>{{ $meeting->city->description }}/{{ $meeting->city->state->code }}</td>
								       	<td>{{ $meeting->city->region->description }}</td>
								       	<td>{{ $meeting->description }}</td>
								       	<td>{{ $meeting->participants_estimated_qty }}</td>
								       	<td>{{ $meeting->participants_confirmed_qty }}</td>
								       	<td>{{ number_format($meeting->participants_refunds_amount, 2,",",".") }}</td>
								    </tr>
							    @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop


@section('js')
	<script type="text/javascript">
	  	$(document).ready(function() 
		{
    		$('#table_meetings').DataTable( 
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