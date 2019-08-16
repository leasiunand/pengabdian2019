@extends('layouts.blank')

@section('title')
  List Arsip
@stop

@section('title-breadcrumb')
  List Arsip
@stop

@section('keterangan-breadcrumb')

@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('arsip.index')}}">Arsip</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="tblarsip" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Nomor Arsip</th>
                        <th>Nama</th>
                        <th>Pemilik</th>
                        <th>Master</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($arsips as $arsip)
                    <tr>
                      <td>{{$arsip->id}}</td>
                      <td>{{$arsip->nama}}</td>
                      <td>{{$arsip->user->nama}}</td>
                      <td>{{$arsip->arsip ? $arsip->arsip->nama :  'Master'}}</td>
                      <td>@if($arsip->status==1) Umum @elseif($arsip->status==2)Rahasia @endif</td>
                      <td class="text-right">
                        @if (Sentinel::getUser()->hasAccess(['arsip.show']))
                        <a href="{{route('arsip.show',$arsip->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Detail"><i class="ion-eye"></i> Detail</a>
                        @endif
                        @if (Sentinel::getUser()->hasAccess(['arsip.edit']) && $arsip->user_id==Sentinel::getUser()->id)
                        <a href="{{route('arsip.edit',$arsip->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                        @endif
                        @if (Sentinel::getUser()->hasAccess(['arsip.destroy']) && $arsip->user_id==Sentinel::getUser()->id)
                        {!! Form::open(['method'=>'DELETE', 'route' => ['arsip.destroy',$arsip->id], 'style' => 'display:inline']) !!}
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
      if(confirm("Yakin Ingin Menghapus Arsip Ini?")==true){
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
      @if (Sentinel::getUser()->hasAccess(['role.create']))
        {
            text: 'Tambah Arsip',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("arsip.create")}}');
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
