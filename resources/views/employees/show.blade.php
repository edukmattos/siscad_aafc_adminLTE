@extends('layouts.app')

@section('content')

	@include('employees.view_header')

  <div class="col-sm-4">
    @include('employees.view')
  </div>

  <div class="col-sm-8">
  	@include('employees.movements')
  	@include('employees.patrimonials')
  </div>
    
@endsection
  