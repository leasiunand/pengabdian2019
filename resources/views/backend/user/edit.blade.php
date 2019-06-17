@extends('layouts.blank')

@section('title')
  Edit {{$user->nama}}
@stop

@section('title-breadcrumb')
  Edit {{$user->nama}}
@stop

@section('keterangan-breadcrumb')
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
    <li class="breadcrumb-item"><a href="#!">Edit</a></li>
    <li class="breadcrumb-item"><a href="#!">{{$user->nama}}</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($user, array('method' => 'PATCH', 'url' => route('user.update', $user->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

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
