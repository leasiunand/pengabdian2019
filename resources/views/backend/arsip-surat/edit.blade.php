@extends('layouts.blank')

@section('title')
  Edit Arsip Surat
@stop

@section('title-breadcrumb')
  Edit Arsip Surat
@stop


@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('arsip.show',$arsip_surat->surat_id)}}">Arsip</a></li>
    <li class="breadcrumb-item"><a href="#!">Edit</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      {{ Form::model($arsip_surat, array('method' => 'PATCH', 'url' => route('arsip-surat.update', $arsip_surat->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}

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
