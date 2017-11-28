@if(Session::has('errors'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h3><i class="icon fa fa-ban"></i> Ops ...</h3>
      @foreach($errors->all() as $error)
        {!! $error !!}
        <br>
      @endforeach
  </div>
@endif

@if(Session::has('flash_message_success'))
  	<div class="alert alert-success" role="alert" align="left">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<b>{{ Session::get('flash_message_success') }}</b>
  	</div>
@endif

@if(Session::has('flash_message_danger'))
  	<div class="alert alert-danger alert-dismissible">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		<b>{{ Session::get('flash_message_danger') }}</b>
  	</div>
@endif

@if(Session::has('flash_message_warning'))
  	<div class="alert alert-warning" role="alert" align="center">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_warning') }}
      <p class="pull-right">
        <a class="btn btn-default" href="#">Link</a>
    </p>
  	</div>
@endif


@if(Session::has('flash_message_patrimonial_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_patrimonial_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('patrimonials.restore', ['id' => $patrimonial->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('patrimonials.show', ['id' => $patrimonial->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_meeting_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_meeting_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('meetings.restore', ['id' => $meeting->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('meetings.show', ['id' => $meeting->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_management_unit_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_management_unit_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('management_units.restore', ['id' => $management_unit->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('management_units.show', ['id' => $management_unit->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

@if(Session::has('flash_message_provider_destroy'))
  <div class="alert alert-danger" role="alert" align="left">
    <b>{{ Session::get('flash_message_provider_destroy') }}</b>
    <p class="pull-right">
      Recuperar ? 
      <a href="{!! route('providers.restore', ['id' => $provider->id]) !!}" class="btn btn-success">SIM</a>
      <a href="{!! route('providers.show', ['id' => $provider->id]) !!}" class="btn btn-danger">Não</a>
    </p>
  </div>
@endif

