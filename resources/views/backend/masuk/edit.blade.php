@extends('layouts.blank')

@section('title')
  Edit {{$surat_masuk->nomor}}
@stop

@section('title-breadcrumb')
  Edit {{$surat_masuk->nomor}}
@stop

@section('keterangan-breadcrumb')
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('surat-masuk.index')}}">Surat Masuk</a></li>
    <li class="breadcrumb-item"><a href="#!">Edit</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($surat_masuk, array('method' => 'PATCH', 'url' => route('surat-masuk.update', $surat_masuk->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          @include('backend.surat._form')
          @include('backend.masuk._form')

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
