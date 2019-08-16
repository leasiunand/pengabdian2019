<div class="modal-body">
  <div class="form-group row">
      <label class="col-sm-2 social-label b-none p-t-0">Keterangan</label>
      <div class="col-sm-10">
          {!! Form::text('nama', null,['class' => 'form-control', 'placeholder'=>'Keterangan']) !!}
          <span class="messages popover-valid"></span>
      </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">File</label>
      <div class="col-sm-10">
        <div class="input-group input-group-button">
            <span class="input-group-addon btn btn-primary" id="basic-addon9" onclick="document.getElementById('file').click()">
                <input id="file" type="file" name="file" onchange="document.getElementById('tfile').value = this.value;" style="display:none">
                <span class="">Upload</span>
            </span>
            <input onclick="document.getElementById('file').click()" id="tfile" type="text" class="form-control" placeholder="Tambahkan File Lampiran">
        </div>
        <span class="messages popover-valid"></span>
      </div>
  </div>
</div>
