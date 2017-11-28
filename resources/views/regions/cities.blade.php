<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">
      <b>CIDADES</b>
    </h3>
    <span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        </thead>
        <tbody>
          @foreach($cities as $city)
            <tr>
              <td>{{ $city->description }} / {{ $city->state->code }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@section('js_scripts')
  <script type="text/javascript">
    $(document).on('click', '.panel-heading span.panel-clickable', function(e)
      {
          var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) 
          {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
          } 
        else 
          {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
          }
      })
  </script>
@endsection