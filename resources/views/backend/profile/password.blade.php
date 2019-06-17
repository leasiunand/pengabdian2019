@extends('layouts.blank')

@section('title')
  Ganti Password
@stop

@section('title-breadcrumb')
  Ganti Password
@stop


@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="#!"></a>Ganti Password</li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($profile, array('method' => 'PATCH', 'url' => 'ganti-password', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          @include('backend.profile._form')

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
