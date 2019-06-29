@extends('layouts.blank')

@section('title')
  Edit {{$surat_keluar->nomor}}
@stop

@section('title-breadcrumb')
  Edit {{$surat_keluar->nomor}}
@stop

@section('keterangan-breadcrumb')
@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('surat-keluar.index')}}">Surat Keluar</a></li>
    <li class="breadcrumb-item"><a href="#!">Edit</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($surat_keluar, array('method' => 'PATCH', 'url' => route('surat-keluar.update', $surat_keluar->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

          @include('backend.surat._form')
          @include('backend.keluar._form')

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
