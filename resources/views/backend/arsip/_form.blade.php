<div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">Arsip Kode</label>
    <div class="col-sm-10">
        {!! Form::text('id', null,['class' => 'form-control', 'placeholder'=>'Arsip Kode']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">Arsip Nama</label>
    <div class="col-sm-10">
        {!! Form::text('nama', null,['class' => 'form-control', 'placeholder'=>'Arsip Nama']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">Status</label>
    <div class="col-sm-10">
        {!! Form::select('status', ['1'=>'Umum', '2'=>'Rahasia'],null,['class' => 'form-control', 'placeholder'=>'--Pilihan--']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>
