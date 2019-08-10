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
