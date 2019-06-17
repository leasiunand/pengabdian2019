@extends('layouts.blank')

@section('title')
  Create New Role
@stop

@section('title-breadcrumb')
  Create New Role
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('role.index')}}">Role</a></li>
    <li class="breadcrumb-item"><a href="{{route('role.create')}}">Create</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::open(array('url' => route('role.store'), 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          @include('backend.role._form')

          <div class="row">
              <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-primary m-b-0">Submit</button>
              </div>
          </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop
