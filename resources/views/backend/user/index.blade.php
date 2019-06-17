@extends('layouts.blank')

@section('title')
  List User
@stop

@section('title-breadcrumb')
  List User
@stop

@section('keterangan-breadcrumb')

@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="tbluser" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                  $no = 0;
                 ?>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{++$no}}</td>
                      <td>{{$user->nama}}</td>
                      <td>{{$user->nim}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->roles()->first()->name}}</td>
                      <td class="text-right">
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                        <a href="#" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Detail"><i class="ion-eye"></i> Detail</a>
                        <a href="{{route('user.permissions',$user->id)}}" class="btn btn-success btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Detail"><i class="icofont icofont-animal-cat-alt-4"></i> Permission</a>
                        {!! Form::open(['method'=>'DELETE', 'route' => ['user.destroy', $user->id], 'style' => 'display:inline']) !!}
                          <button onclick="confirmdelete()" type="submit" class="btn btn-danger btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="ion-trash-b"></i> Hapus</button>
                        {!! Form::close() !!}
                        <a href="#" data-toggle="modal" data-target="#{{$user->id}}" class="btn btn-inverse btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="QRCODE"><i class="fa fa-qrcode"></i> QRCode</a>
                        @if(sizeof($user->activations) == 0)
                          @if (Sentinel::getUser()->hasAccess(['user.activate']))
                            <a onclick="confirmaktivasi()" href="{{route('user.activate', $user->id)}}" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Aktivasi"><i class="ion-key"></i> Aktiv</a>
                          @endif
                        @else
                          @if (Sentinel::getUser()->hasAccess(['user.deactivate']))
                            <a onclick="confirmdeaktivasi()" href="{{route('user.deactivate', $user->id)}}" class="btn btn-warning btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Aktivasi"><i class="ion-key"></i> Deactiv</a>
                          @endif
                        @endif
                      </td>
                    </tr>
                    <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                          <div class="md-content">
                              <h3>QR-Code - {{$user->nama}}</h3>
                              <div class="text-center">
                                  <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->errorCorrection('H')->generate($user->QRpassword)) !!}" download="QRCODE-{{$user->nama}}"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(200)->errorCorrection('H')->generate($user->QRpassword)) !!} " style="height:400px"></a>
                                  <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                    </div>
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
      if(confirm("Yakin Menghapus User Iko COY!!!?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    function confirmaktivasi() {
      if(confirm("Yakin Meng-aktivkan User Iko COY!!!?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }

    function confirmdeaktivasi() {
      if(confirm("Yakin Meng-Nonaktivkan User Iko COY!!!?")==true){
        return true;
      }else{
        event.preventDefault();
      }
    }


    $('#tbluser').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['user.create']))
        {
            text: 'Tambah User',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("user.create")}}');
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
