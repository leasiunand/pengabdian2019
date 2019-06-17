@extends('layouts.blank')

@section('title')
  My QR-Code
@stop

@section('title-breadcrumb')
  My QR-Code
@stop


@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('my-qrcode')}}">My Qr-Code</a></li>
@stop

@section('content')
@php
  $logo = asset('img/lea-logo.png');
@endphp
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      <div class="text-center">
          <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge($logo, .3, true)->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->errorCorrection('H')->generate($user->QRpassword)) !!}" download="QRCODE-{{$user->nama}}"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge($logo, .3, true)->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->errorCorrection('H')->generate($user->QRpassword)) !!} " style="height:400px"></a>
          <br>
          <span>Klick Image To DownLoad</span>
      </div>
    </div>
  </div>
</div>
@stop
