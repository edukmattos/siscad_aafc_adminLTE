<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">
			<b>ARQUIVOS</b>
		</h3>
			<span class="pull-right clickable"><i class="fa fa-chevron-down"></i></span>
	</div>

	<div class="panel-body" style="display:none;">		
		{!! Form::open(['route' => ['patrimonial_files.upload', $patrimonial->id], 'files' => true, 'class' => 'form-horizontal', 'role'=>'form']) !!}
			<div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
				{!! Form::label('filename', 'Arquivo', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
				<div class="col-xs-12 col-sm-8 col-md-5 col-lg-2">
					<div class="input-group input-group-sm">
						<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
						{!! Form::file('filename', ['class' => 'custom-file-input']) !!}
					</div>
				</div>
			</div>

			<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">			
				{!! Form::label('description', 'Descrição', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
				<div class="col-xs-12 col-sm-8 col-md-5 col-lg-3">
					<div class="input-group input-group-sm">
						<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
						{!! Form::text('description', $value = null, ['class'=>'form-control']) !!}
					</div>
				</div>	
				<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-upload"></i></button>			
			</div>
       	{!! Form::close() !!}


         <div class="table-responsive">
          	<table class="table table-bordered table-striped" id="table_patrimonial_files" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-width="1%" data-align="center">
							#				        	
						</th>
						<th data-width="1%" data-align="center">Tipo</th>
						<th data-align="left">Descrição</th>
						<th data-width="1%" data-align="center">#</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($patrimonial_files as $patrimonial_file)
						<tr>
							<td>
								<a href="{!! route('patrimonial_files.download', [$patrimonial_file->patrimonial_id, $patrimonial_file->id]) !!}" type="button" rel="tooltip" title="Baixar"><i class="fa fa-cloud-download"></i></a>
							</td>
							<td>
								@if (($patrimonial_file->extension == 'jpg') || ($patrimonial_file->extension == 'jpg') || ($patrimonial_file->extension == 'png'))
									<i class="fa fa-file-image-o"></i>
								@endif

								@if ($patrimonial_file->extension == 'pdf')
									<i class="fa fa-file-pdf-o"></i>
								@endif
							</td>
							<td>{{ $patrimonial_file->description }}</td>
							<td>
								<a href="{!! route('patrimonial_files.destroy', [$patrimonial_file->patrimonial_id, $patrimonial_file->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
							</td>							
						</tr>
					@endforeach
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
	</div>
</div>

@section('js_scripts')
	<script type="text/javascript">
		$(document).on('click', '.panel-heading span.clickable', function (e) 
		{
    		var $this = $(this);
    		if (!$this.hasClass('panel-collapsed')) 
    		{
    			console.log($this);
    			$this.parents('.panel').find('.panel-body').slideDown();
        		$this.addClass('panel-collapsed');
        		$this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');        		
    		} 
    		else 
    		{
    			console.log($this);
        		$this.parents('.panel').find('.panel-body').slideUp();
        		$this.removeClass('panel-collapsed');
        		$this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
    		}
		});
	</script>
@endsection