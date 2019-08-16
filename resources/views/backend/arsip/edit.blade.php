@extends('layouts.blank')

@section('title')
  Edit Arsip Kode {{$arsip->id}}
@stop

@section('title-breadcrumb')
  Edit Arsip Kode {{$arsip->id}}
@stop

@section('keterangan-breadcrumb')
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('arsip.index')}}">Arsip</a></li>
    <li class="breadcrumb-item"><a href="#!">Edit</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($arsip, array('method' => 'PATCH', 'url' => route('arsip.update', $arsip->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          <div class="form-group row">
              <label class="col-sm-2 social-label b-none p-t-0">Arsip Master</label>
              <div class="col-sm-10">
                  {!! Form::select('arsip_id', $master ,null,['class' => 'js-example-basic-single', 'placeholder'=>'Arsip Master']) !!}
                  <span class="messages popover-valid"></span>
              </div>
          </div>

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
