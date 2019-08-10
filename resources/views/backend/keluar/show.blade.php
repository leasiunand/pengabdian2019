@extends('layouts.blank')

@section('title')
  Detail Surat No {{$keluar->surat->nomor}}
@stop

@section('title-breadcrumb')
  Detail Surat No {{$keluar->surat->nomor}}
@stop


@section('icon-breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('surat-keluar.index')}}">Surat Keluar</a></li>
    <li class="breadcrumb-item"><a href="#">Detail</a></li>
@stop

@section('content')
<div class="card">
    <div class="card-block">
      <div class="dt-responsive table-responsive" cellpadding="10">
          <table class="table nowrap">
            <tr>
              <td style="width:200px">Nomor Surat</td>
              <td>: {{$keluar->surat->nomor}}</td>
              <td style="width:200px"></td>
              <td style="width:200px">NO Serial Barang</td>
              <td>: <?php echo $data['no_serial']; ?></td>
            </tr>
            <tr>
              <td style="width:200px">Tanggal</td>
              <td>: <?php echo $data['tanggal']; ?></td>
              <td style="width:200px"></td>
              <td style="width:200px">Jenis</td>
              <td>: <?php echo $data['jenis']; ?></td>
            </tr>
            <tr>
              <td style="width:200px">Kondisi Peminjaman</td>
              <td>: <?php echo kondisi($data['kondisi']);?></td>
              <td style="width:200px"></td>
              <td style="width:200px">Merek</td>
              <td>: <?php echo $data['merek']; ?></td>
            </tr>
            <tr>
              <td style="width:200px">Pemberi</td>
              <td>: <?php echo $data['pemberi']; ?></td>
              <td style="width:200px"></td>
              <td style="width:200px">Tipe</td>
              <td>: <?php echo $data['type']; ?></td>
            </tr>
            <tr>
              <td class="text-center" colspan="5">Keterangan</td>
            </tr>
            <tr>
              <td class="text-center" colspan="5"><?php echo $data['keterangan']; ?></td>
            </tr>
            <tr>
              <td class="text-center" colspan="5"> <?php echo cek($data['id']); ?> </td>
            </tr>
          </table>
        <?php } ?>
      </div>
    </div>
</div>

<div class="text-center">
  <a href="#" onclick="window.history.back();" class="btn btn-primary waves-effect waves-light">Back</a>
</div>
@stop
