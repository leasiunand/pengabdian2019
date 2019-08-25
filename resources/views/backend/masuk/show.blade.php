@extends('layouts.blank')

@section('title')
  Detail Surat No {{$masuk->surat->nomor}}
@stop

@section('title-breadcrumb')
  Detail Surat No {{$masuk->surat->nomor}}
@stop


@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('surat-masuk.index')}}">Surat Masuk</a></li>
    <li class="breadcrumb-item"><a href="#">Detail</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
      <div class="card-block">
        <div class="dt-responsive table-responsive" cellpadding="10">
            <table class="table nowrap">
              <tr>
                <td style="width:200px">Nomor Surat</td>
                <td>: {{$masuk->surat->nomor}}</td>
                <td style="width:200px"></td>
                <td style="width:200px">Tanggal</td>
                <td>: {{$masuk->surat->tanggal_surat->format('d M Y')}}</td>
              </tr>
              <tr>
                <td style="width:200px">Perilah</td>
                <td>: {{$masuk->surat->perihal}}</td>
                <td style="width:200px"></td>
                <td style="width:200px">Lampiran</td>
                <td>: {{$masuk->surat->lampiran->count()}}</td>
              </tr>
              <tr>
                <td style="width:200px">Pengirim</td>
                <td>: {{$masuk->pengirim}}</td>
                <td style="width:200px"></td>
                <td style="width:200px">Created At</td>
                <td>: {{$masuk->created_at->format('d M Y')}}</td>
              </tr>
              <tr>
                <td class="text-center" colspan="5"><a target="_blank" href="{{url('surat/masuk/'.$masuk->surat->file)}}" class="btn btn-success btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Download"> Download</a></td>
              </tr>
            </table>
        </div>
      </div>
  </div>

  <div class="card">
      <div class="card-header">
        <h4>Lampiran</h4>
      </div>
      <div class="card-block">
        <div class="dt-responsive table-responsive" cellpadding="10">
            <table id="tbllampiran" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                <tr>
                  <th style="width:20px">No</th>
                  <th>File</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1 ?>
              @foreach($masuk->surat->lampiran as $lampiran)
                <tr>
                  <td class="text-center">{{$no++}}</td>
                  <td><a target="_blank" href="{{url('surat/lampiran/'.$lampiran->file)}}" data-toggle="tooltip" data-placement="right" title="Download">{{$lampiran->nama}}</a></td>
                  <td>
                    @if (Sentinel::getUser()->hasAccess(['lampiran.edit']))
                    <a href="{{route('lampiran.edit',$lampiran->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                    @endif
                    @if (Sentinel::getUser()->hasAccess(['lampiran.destroy']))
                    {!! Form::open(['method'=>'DELETE', 'route' => ['lampiran.destroy',$lampiran->id], 'style' => 'display:inline']) !!}
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

  <div class="card">
      <div class="card-header">
        <h4>Disposisi</h4>
      </div>
      <div class="card-block">
        <div class="dt-responsive table-responsive" cellpadding="10">
            <table id="tbldisposisi" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                <tr>
                  <th style="width:20px">No</th>
                  <th>Nama</th>
                  <th>Catatan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1 ?>
              @foreach($masuk->surat->disposisi as $disposisi)
                <tr>
                  <td class="text-center">{{$no++}}</td>
                  <td>{{$disposisi->user->nama}}</td>
                  <td>{{$disposisi->catatan}}</td>
                  <td>
                    @if (Sentinel::getUser()->hasAccess(['disposisi.destroy']))
                    {!! Form::open(['method'=>'DELETE', 'route' => ['disposisi.destroy',$disposisi->id], 'style' => 'display:inline']) !!}
                      <button onclick="confirmdeleted()" type="submit" class="btn btn-danger btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="ion-trash-b"></i> Hapus</button>
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

  <div class="text-center">
    <a href="#" onclick="{{route('surat-masuk.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
  </div>
</div>
@stop

@section('script')
<script type="text/javascript">

    function confirmdelete() {
      if(confirm("Yakin Ingin Menghapus Lampiran Surat Ini?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    function confirmdeleted() {
      if(confirm("Yakin Ingin Menghapus Disposisi Surat Ini?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    $('#tbllampiran').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['lampiran.create']))
        {
            text: 'Tambah Lampiran',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("lampiran.create")}}?surat_id={{$masuk->surat_id}}');
            }
        },
      @endif
      {
          extend: 'copy',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      },
      {
          extend: 'print',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      },
      {
          extend: 'excel',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      },
      {
          extend: 'pdf',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      }]
    });

    $('#tbldisposisi').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['disposisi.store']))
        {
            text: 'Tambah Disposisi',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              $('#create-disposisi').modal('toggle');
               window.location.assign('{{route("disposisi.create")}}?surat_id={{$masuk->surat_id}}');
            }
        },
      @endif
      {
          extend: 'copy',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      },
      {
          extend: 'print',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      },
      {
          extend: 'excel',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      },
      {
          extend: 'pdf',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1]
          }
      }]
    });
</script>
@stop
