<div class="card">
    <div class="card-header">
      <h4>Arsip Surat</h4>
    </div>
    <div class="card-block">
      <div class="dt-responsive table-responsive" cellpadding="10">
          <table id="tblarsipsurat" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Tanggl Surat</th>
                    <th>Tanggal Arsip</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($arsip->arsipsurat as $arsu)
                <tr>
                  <td>{{$arsu->surat->nomor}}</td>
                  <td>{{$arsu->surat->tanggal_surat->format('d M Y')}}</td>
                  <td>{{$arsu->tanggal->format('d M Y')}}</td>
                  <td class="text-right">
                    <a target="_blank" href="{{url('surat/keluar/'.$arsu->surat->file)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-android-download"></i> Download</a>
                    <a href="{{route('surat-keluar.show',$arsu->surat->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Detail"><i class="ion-eye"></i> Detail</a>
                    @if (Sentinel::getUser()->hasAccess(['arsip-surat.edit']) && $arsip->user_id==Sentinel::getUser()->id)
                    <a href="{{route('arsip-surat.edit',$arsu->id)}}" class="btn btn-primary btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit"><i class="ion-edit"></i> Edit</a>
                    @endif
                    @if (Sentinel::getUser()->hasAccess(['arsip-surat.destroy']) && $arsip->user_id==Sentinel::getUser()->id)
                    {!! Form::open(['method'=>'DELETE', 'route' => ['arsip-surat.destroy',$arsu->id], 'style' => 'display:inline']) !!}
                      <button onclick="confirmdeletes()" type="submit" class="btn btn-danger btn-mini waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Hapus"><i class="ion-trash-b"></i> Hapus</button>
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
