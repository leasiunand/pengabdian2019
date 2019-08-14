@extends('layouts.blank')

@section('title')
  List Surat Keluar
@stop

@section('title-breadcrumb')
  List Surat Keluar
@stop

@section('keterangan-breadcrumb')

@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('surat-keluar.index')}}">Surat Keluar</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="tblkeluar" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No Surat</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                        <th>Penerima</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($surat_keluars as $keluar)
                    <tr>
                      <td>{{$keluar->surat->nomor}}</td>
                      <td>{{$keluar->surat->tanggal_surat->format('d M Y')}}</td>
                      <td>{{$keluar->surat->perihal}}</td>
                      <td>{{$keluar->penerima}}</td>
                      <td class="text-right">
                        <a target="_blank" href="{{url('surat/keluar/'.$keluar->surat->file)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-android-download"></i> Download</a>
                        @if (Sentinel::getUser()->hasAccess(['surat-keluar.edit']))
                        <a href="{{route('surat-keluar.edit',$keluar->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                        @endif
                        @if (Sentinel::getUser()->hasAccess(['surat-keluar.show']))
                        <a href="{{route('surat-keluar.show',$keluar->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-eye"></i> Detail</a>
                        @endif
                        @if (Sentinel::getUser()->hasAccess(['surat-keluar.destroy']))
                        {!! Form::open(['method'=>'DELETE', 'route' => ['surat-keluar.destroy',$keluar->id], 'style' => 'display:inline']) !!}
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
</div>
@stop

@section('script')
<script type="text/javascript">

    function confirmdelete() {
      if(confirm("Yakin Ingin Menghapus Surat Keluar Ini?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    $('#tblkeluar').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['surat-keluar.create']))
        {
            text: 'Tambah Surat Keluar',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("surat-keluar.create")}}');
            }
        },
      @endif
      {
          extend: 'copy',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2, 3]
          }
      },
      {
          extend: 'print',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2, 3]
          }
      },
      {
          extend: 'excel',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2, 3]
          }
      },
      {
          extend: 'pdf',
          className: 'btn-inverse',
          exportOptions: {
              columns: [0, 1, 2, 3]
          }
      }]
    });
</script>
@stop
