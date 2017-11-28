@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-warning">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                        {{ Auth::user()->status }}
                        @if (Auth::user())
                            {{ Auth::user()->name }}
                        @else
                            Nao OK
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop