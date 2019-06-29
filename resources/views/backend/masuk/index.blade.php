@extends('layouts.blank')

@section('title')
  List Surat masuk
@stop

@section('title-breadcrumb')
  List Surat Masuk
@stop

@section('keterangan-breadcrumb')

@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('surat-masuk.index')}}">Surat Masuk</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="tblmasuk" class="table table-striped table-bordered nowrap" style="width:100%">
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
                  @foreach($surat_masuk as $masuk)
                    <tr>
                      <td>{{$masuk->surat->nomor}}</td>
                      <td>{{$masuk->surat->tanggal_surat}}</td>
                      <td>{{$masuk->surat->perihal}}</td>
                      <td>{{$masuk->penerima->nama}}</td>
                      <td class="text-right">
                        <a target="_blank" href="{{url('surat/masuk/'.$masuk->surat->file)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-android-download"></i> Download</a>
                        <a href="{{route('surat-masuk.edit',$masuk->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                        {!! Form::open(['method'=>'DELETE', 'route' => ['surat-masuk.destroy',$masuk->id], 'style' => 'display:inline']) !!}
                          <button onclick="confirmdelete()" type="submit" class="btn btn-danger btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="ion-trash-b"></i> Hapus</button>
                        {!! Form::close() !!}
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
      if(confirm("Yakin Ingin Menghapus Surat masuk Ini?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    $('#tblmasuk').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['role.create']))
        {
            text: 'Tambah Surat masuk',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("surat-masuk.create")}}');
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
