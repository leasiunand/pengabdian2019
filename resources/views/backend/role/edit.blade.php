@extends('layouts.blank')

@section('title')
  Edit {{$role->slug}}
@stop

@section('title-breadcrumb')
  Edit {{$role->slug}}
@stop

@section('keterangan-breadcrumb')
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('role.index')}}">Role</a></li>
    <li class="breadcrumb-item"><a href="{{route('role.edit',$role->id)}}">Edit</a></li>
    <li class="breadcrumb-item"><a href="#!">{{$role->slug}}</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($role, array('method' => 'PATCH', 'url' => route('role.update', $role->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

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
