@extends('layouts.blank')

@section('title')
  Dashboard
@stop

@section('title-breadcrumb')
  
@stop

@section('keterangan-breadcrumb')

@stop

@section('icon-breadcrumb')
    <!-- <li class="breadcrumb-item"><a href="#!">Dash</a></li> -->
@stop

@section('content')
<div class="col-xl-6 col-md-6">
  <div class="card">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="text-c-green f-w-600">{{$masuk}}</h4>
                    <h6 class="text-muted m-b-0">Surat Masuk</h6>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-green">
            <div class="row align-items-center">
                <div class="col-12">   
                    <a href="{{route('surat-masuk.index')}}" class="text-white m-b-0"> Lihat Data</a>
                 </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-md-6">
  <div class="card">
        <div class="card-block">

            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="text-c-yellow f-w-600">{{$keluar}}</h4>
                    <h6 class="text-muted m-b-0">Surat Keluar</h6>
                </div>
            </div>
        </div>
        <div class="card-footer bg-c-yellow">
            <div class="row align-items-center">
                <div class="col-12">
                    
                    <a href="{{route('surat-keluar.index')}}" class="text-white m-b-0"> Lihat Data</a>
                                  </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="tblsurat" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No Surat</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                      
                    </tr>
                </thead>
                <tbody>
                	@foreach($surat as $surat)
					<tr>
                      <td>{{$surat->nomor}}</td>
                      <td>{{$surat->tanggal_surat}}</td>
                      <td>{{$surat->perihal}}</td> 
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

    

    $('#tblsurat').DataTable(
      {
      "info":     false,
      dom: 'Bfrtip',
      buttons: [
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

