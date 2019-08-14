<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nomor</label>
    <div class="col-sm-10">
        {!! Form::text('nomor', null, ['class' => 'form-control', 'placeholder'=>'Nomor Surat']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tanggal</label>
    <div class="col-sm-10">
        {!! Form::date('tanggal_surat',null, ['class' => 'form-control', 'placeholder'=>'Tanggal Surat']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Perihal</label>
    <div class="col-sm-10">
        {!! Form::text('perihal', null, ['class' => 'form-control', 'placeholder'=>'Perihal']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<!--  -->

<div class="form-group row">
    <label class="col-sm-2 col-form-label">File</label>
    <div class="col-sm-10">
      <div class="input-group input-group-button">
          <span class="input-group-addon btn btn-primary" id="basic-addon9" onclick="document.getElementById('file').click()">
              <input id="file" type="file" name="file" onchange="document.getElementById('tfile').value = this.value;" style="display:none">
              <span class="">Upload</span>
          </span>
          <input onclick="document.getElementById('file').click()" id="tfile" type="text" class="form-control" placeholder="Upload Foto yang Rancak Disiko">
      </div>
      <span class="messages popover-valid"></span>
    </div>
</div>
