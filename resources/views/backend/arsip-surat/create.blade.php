@extends('layouts.blank')

@section('title')
  Arsip Surat
@stop

@section('title-breadcrumb')
  Arsip Surat
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('arsip.show',$arsip_id)}}">Arsip</a></li>
    <li class="breadcrumb-item"><a href="#">Create</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::open(array('url' => route('arsip-surat.store'), 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          <input type="hidden" name="arsip_id" value="{{$arsip_id}}">

          @include('backend.arsip-surat._form')

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
