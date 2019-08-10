@extends('layouts.blank')

@section('title')
  Arsip
@stop

@section('title-breadcrumb')
  Arsip
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('arsip.index')}}">Arsip</a></li>
    <li class="breadcrumb-item"><a href="{{route('arsip.create')}}">Create</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::open(array('url' => route('arsip.store'), 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          @include('backend.arsip._form')

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
