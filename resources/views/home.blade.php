@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Painel Controle</h1>
@stop

@section('content')
  <h4>ASSOCIADOS</h4>
  <div class="row">
    <div class="col-sm-4">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Plano: ESPECIAL</h3>
          <div class="box-tools pull-right">
            <span class="label label-danger">8 Novos Sócios</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            @foreach($plan1_last_members as $member)
              <li>
                <img src="/uploads/avatars/users/default.png" class="img-circle img-responsive center-block" width="100">
                <a class="users-list-name" href="{!! route('members.show', ['id' => $member->id]) !!}">{{ $member->name }}</a>
                <span class="users-list-date">{{ $member->date_aafc_ini->diffForHumans() }}</span>
              </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Users</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>

    <div class="col-sm-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Plano: NORMAL</h3>
          <div class="box-tools pull-right">
            <span class="label label-danger">8 Novos Sócios</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            @foreach($plan2_last_members as $member)
              <li>
                <img src="/uploads/avatars/users/default.png" class="img-circle img-responsive center-block" width="100">
                <a class="users-list-name" href="{!! route('members.show', ['id' => $member->id]) !!}">{{ $member->name }}</a>
                <span class="users-list-date">{{ $member->date_aafc_ini->diffForHumans() }}</span>
              </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Users</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
  
    <div class="col-sm-4">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Plano: INSS</h3>
          <div class="box-tools pull-right">
            <span class="label label-danger">8 Novos Sócios</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            @foreach($plan3_last_members as $member)
              <li>
                <img src="/uploads/avatars/users/default.png" class="img-circle img-responsive center-block" width="100">
                <a class="users-list-name" href="{!! route('members.show', ['id' => $member->id]) !!}">{{ $member->name }}</a>
                <span class="users-list-date">{{ $member->date_aafc_ini->diffForHumans() }}</span>
              </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Users</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
  </div>

  <h4>PATRIMÔNIOS</h4>
  <div class="row">
    <div class="col-sm-4">
        <!-- PRODUCT LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos Patrimônios</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($last_patrimonials as $patrimonial)
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-50x50.gif" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}" class="product-title">
                                    {{ $patrimonial->patrimonial_brand->description }}
                                    <span class="label label-warning pull-right">
                                        R$ {{ number_format($patrimonial->purchase_value, 2,",",".") }}
                                    </span>
                                </a>
                                <span class="product-description">
                                    {{ $patrimonial->patrimonial_sub_type->description }} {{ $patrimonial->patrimonial_model->description }}
                                </span>
                            </div>
                        </li>
                    @endforeach
                    <!-- /.item -->
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

        <!-- TABLE: LATEST ORDERS -->
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Últimas Requisições</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Popularity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
  </div>

@stop