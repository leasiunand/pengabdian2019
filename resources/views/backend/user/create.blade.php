@extends('layouts.blank')

@section('title')
  Create Profil
@stop

@section('title-breadcrumb')
  Create Profil
@stop

@section('keterangan-breadcrumb')
  bla bla bla
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
    <li class="breadcrumb-item"><a href="#!">Create</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::open(array('url' => route('user.store'), 'class' => 'form-horizontal','files' => true,'class'=>'form-horizontal form-label-left','data-parsley-validate','id'=>'demo-form2')) }}

          @include('backend.user._form')

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
