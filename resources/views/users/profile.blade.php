@extends('layouts.app')

@section('content')

  <ol class="breadcrumb">
      <li class="breadcrumb-item"><b>MEU PERFIL</b></li>
  </ol>

  <div class="row">
    <div class="col-sm-8">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{ $user->name }}</b></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Nome completo</td>
                <td class="text-left">{{ $user->fullname }}</td>
              </tr>

              <tr>
                <td class="text-right">e-mail</td>
                <td class="text-left">{{ $user->email }}</td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>GRUPOS</b></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar"> 
            <thead>
            </thead>
            <tbody>
              @foreach ($user->roles as $role)
                <tr>
                  <td>{{ $role->display_name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>AVATAR</b></h3>
      </div>
      <div class="panel-body">
        <div class="col-sm-12 col-sm-offset-0">
          <img src="/uploads/avatars/users/{{ $user->avatar }}" class="img-circle img-responsive center-block" width="125">
          
          {!! Form::model($user, ['route' => ['users.avatar', $user->id], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="control-group">
              <label class="custom-file">
                {!! Form::file('avatar', ['class' => 'custom-file-input']) !!}
                <span class="custom-file-control"></span>
              </label>
              <button type="submit" class="pull-right btn btn-sm btn-success">Alterar <i class="fa fa-check"></i></button>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    </div>
  </div>
@endsection

@section('js_scripts')
  <script type="text/javascript">
      $('#roles_list').select2();
  </script>
@endsection
  