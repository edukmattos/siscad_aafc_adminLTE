@extends('adminlte::page')

@section('content_header')
    <h1>CONFIGURAÇÃO: LOCALIDADES - REGIÕES</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('regions.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    </div>
	</ol>
@stop

@section('content')
	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <div class="box-body"><!-- Main content -->
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_regions"> 
							<thead>
								<tr>
									<th width="2%">Código</th>
		        					<th>Descrição</th>
		        					<th width="4%">Cidades</th>
		        				</tr>
		        			</thead>
		        			<tfoot>
		        				<tr>
									<th width="2%">Código</th>
		        					<th>Descrição</th>
		        					<th width="4%">Cidades</th>
		        				</tr>
		        			</tfoot>
							<tbody>
							    @foreach($regions as $region)
								    <tr>
										<td><a href="{!! route('regions.show', [$region->id]) !!}">{{ $region->code }}</a></td>
								        <td>{{ $region->description }}</td>
								    	<td class="text-center">
							        		<span class="badge">
							        			@if (!$region->cities)
							        				0
							        			@else
							        				{{ $region->cities->count() }}
							        			@endif
							        		</span>
							        	</td>
							        </tr>
							    @endforeach
						    </tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
