@extends('layouts.blank')

@section('title')
  List Role
@stop

@section('title-breadcrumb')
  List Role
@stop

@section('keterangan-breadcrumb')

@stop

@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('role.index')}}">Role</a></li>
@stop

@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="tblrole" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Slug</th>
                        <th>keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                  $no = 0;
                 ?>
                <tbody>
                  @foreach($roles as $role)
                    <tr>
                      <td>{{++$no}}</td>
                      <td>{{$role->slug}}</td>
                      <td>{{$role->name}}</td>
                      <td class="text-right">
                        <a href="{{route('role.edit',$role->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                        <a href="{{route('role.permissions',$role->id)}}" class="btn btn-success btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Detail"><i class="icofont icofont-animal-cat-alt-4"></i> Permission</a>
                        {!! Form::open(['method'=>'DELETE', 'route' => ['role.destroy', $role->id], 'style' => 'display:inline']) !!}
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


    $('#tblrole').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
      @if (Sentinel::getUser()->hasAccess(['role.create']))
        {
            text: 'Tambah Role',
            className: 'btn-success',
            action: function(e, dt, node, config)
            {
              window.location.assign('{{route("role.create")}}');
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
