<div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">Tanggal</label>
    <div class="col-sm-10">
        {!! Form::date('tanggal', null,['class' => 'form-control']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">Surat</label>
    <div class="col-sm-10">
        {!! Form::select('surat_id', $surat ,null,['class' => 'js-example-basic-single', 'placeholder'=>'Nomor Surat']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>
