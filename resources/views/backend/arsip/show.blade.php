@extends('layouts.blank')

@section('title')
  Detail Arsip {{$arsip->nama}}
@stop

@section('title-breadcrumb')
  Detail Arsip {{$arsip->nama}}
@stop


@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('arsip.index')}}">Arsip</a></li>
    @if($arsip->arsip_id)
    <li class="breadcrumb-item"><a href="{{route('arsip.show',$arsip->arsip_id)}}">{{$arsip->arsip->nama}}</a></li>
    @endif
    <li class="breadcrumb-item"><a href="#">{{$arsip->nama}}</a></li>
    <li class="breadcrumb-item"><a href="#">Detail</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
      <div class="card-block">
        <div class="dt-responsive table-responsive" cellpadding="10">
            <table class="table nowrap">
              <tr>
                <th style="width:200px">Kode Arsip</th>
                <td>: {{$arsip->id}}</td>
                <td style="width:200px"></td>
                <th style="width:200px">Pemilik</th>
                <td>: {{$arsip->user->nama}}</td>
              </tr>
              <tr>
                <th style="width:200px">Nama Arsip</th>
                <td>: {{$arsip->nama}}</td>
                <td style="width:200px"></td>
                <th style="width:200px">Master</th>
                <td>: {{$arsip->arsip ? $arsip->arsip->nama :  'Master'}}</td>
              </tr>
              <tr>
                <th class="text-center" colspan="5">Status</th>
              </tr>
              <tr>
                <td class="text-center" colspan="5">@if($arsip->status==1) Umum @elseif($arsip->status==2)Rahasia @endif</td>
              </tr>
            </table>
        </div>
      </div>
  </div>

  <div class="card">
      <div class="card-header">
        <h4>Arsip</h4>
      </div>
      <div class="card-block">
        <div class="dt-responsive table-responsive" cellpadding="10">
            <table id="tblarsip" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>Nomor Arsip</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($arsips as $ars)
                  <tr>
                    <td>{{$ars->id}}</td>
                    <td>{{$ars->nama}}</td>
                    <td>@if($ars->status==1) Umum @elseif($ars->status==2)Rahasia @endif</td>
                    <td class="text-right">
                      @if (Sentinel::getUser()->hasAccess(['arsip.show']))
                      <a href="{{route('arsip.show',$ars->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Detail"><i class="ion-eye"></i> Detail</a>
                      @endif
                      @if (Sentinel::getUser()->hasAccess(['arsip.edit']) && $arsip->user_id==Sentinel::getUser()->id)
                      <a href="{{route('arsip.edit',$ars->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                      @endif
                      @if (Sentinel::getUser()->hasAccess(['arsip.destroy']) && $arsip->user_id==Sentinel::getUser()->id)
                      {!! Form::open(['method'=>'DELETE', 'route' => ['arsip.destroy',$ars->id], 'style' => 'display:inline']) !!}
                        <button onclick="confirmdelete()" type="submit" class="btn btn-danger btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="ion-trash-b"></i> Hapus</button>
                      {!! Form::close() !!}
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
  </div>

  @include('backend.arsip-surat.index')

  <div class="text-center">
    <!-- <a href="#" onclick="{{route('surat-keluar.index')}}" class="btn btn-primary waves-effect waves-light">Back</a> -->
  </div>
</div>
@stop

@section('script')
<script type="text/javascript">

    function confirmdelete() {
      if(confirm("Yakin Ingin Menghapus Arsip Ini?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    function confirmdeletes() {
      if(confirm("Yakin Ingin Menghapus Surat Dari Arsip Ini?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    $('#tblarsip').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['arsip.create']))
        {
            text: 'Tambah Arsip',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("arsip.create")}}?arsip_id={{$arsip->id}}');
            }
        },
      @endif
      {
          extend: 'copy',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      },
      {
          extend: 'print',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      },
      {
          extend: 'excel',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      },
      {
          extend: 'pdf',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      }]
    });

    $('#tblarsipsurat').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['arsip-surat.create']))
        {
            text: 'Tambah Surat',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("arsip-surat.create")}}?arsip_id={{$arsip->id}}');
            }
        },
      @endif
      {
          extend: 'copy',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      },
      {
          extend: 'print',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      },
      {
          extend: 'excel',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      },
      {
          extend: 'pdf',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2]
          }
      }]
    });
</script>
@stop
