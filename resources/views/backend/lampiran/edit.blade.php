@extends('layouts.blank')

@section('title')
  Edit {{$lampiran->nama}}
@stop

@section('title-breadcrumb')
  Edit {{$lampiran->nama}}
@stop

@section('keterangan-breadcrumb')
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="#">Lampiran</a></li>
    <li class="breadcrumb-item"><a href="#!">Edit</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($lampiran, array('method' => 'PATCH', 'url' => route('lampiran.update', $lampiran->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

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
