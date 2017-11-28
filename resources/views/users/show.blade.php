@extends('layouts.app')

@section('content')

  <ol class="breadcrumb">
      <li class="breadcrumb-item">Administração</li>
      <li class="breadcrumb-item">Acessibilidade</li>
      <li class="breadcrumb-item"><a href="{!! route('users') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Usuários</b></a></li>
      <li class="breadcrumb-item"><b>CONSULTA</b></li>
  </ol>

  <div class="col-sm-8">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{ $user->name }}</b></h3>
      </div>
      <div class="panel-body">
        <div class="col-sm-2">
          <img src="/uploads/avatars/users/{{ $user->avatar }}" class="img-circle img-responsive center-block" width="100">
        </div>
        <div class="col-sm-10">
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

                <tr>
                  <td class="text-right">Cadastro</td>
                  <td class="text-left">{{ $user->created_at->format('d/m/y h:m') }} h</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>GRUPOS</b></h3>
      </div>
      <div class="panel-body">
        <div class="row">
          {!! Form::open(['route' => ['users_roles.store', $user->id], 'class'=>'form-vertical', 'role'=>'form']) !!}
            <div class="form-group">
              <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="input-group input-group-sm">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  {!! Form::select('role_id', $user_roles, null, ['id'=>'roles_list', 'class'=>'form-control']) !!}
                </div>
              </div>
            </div>
            <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1 pull-left">
              <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></button>
            </div>
          {!! Form::close() !!}
        </div>
        
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table_roles" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar"> 
            <thead>
            </thead>
            <tbody>
              @foreach ($user->roles as $role)
                <tr>
                  <td>{{ $role->display_name }}</td>
                  <td width="1%">
                    <a href="{{ route('users_roles.destroy', [$user->id, $role->id]) }}" id="link_delete" type="button" class="round round-sm hollow red" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
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

@section('js_scripts')
  <script type="text/javascript">
      $('#roles_list').select2();
  </script>
@endsection
  