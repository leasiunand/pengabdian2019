@extends('layouts.blank')

@section('title')
  Create Lampiran
@stop

@section('title-breadcrumb')
  Create Lampiran
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Lampiran</a></li>
    <li class="breadcrumb-item"><a href="#">Create</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::open(array('url' => route('lampiran.store'), 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          <input type="hidden" name="surat_id" value="{{$surat_id}}">

          @include('backend.lampiran._form')

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
