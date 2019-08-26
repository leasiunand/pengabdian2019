<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-10">
        {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder'=>'Nama Lengkap']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nomor Induk Pegawai</label>
    <div class="col-sm-10">
        {!! Form::text('nim', null, ['class' => 'form-control', 'placeholder'=>'Nomor Induk Pegawai']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
        {!! Form::select('role', $role,null, ['class' => 'form-control', 'placeholder'=>'--pilihan--']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder'=>'Email']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder'=>'Username']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
        {!! Form::password('password_confirm',['class' => 'form-control', 'placeholder'=>'Konfirm Password']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Avatar</label>
    <div class="col-sm-10">
      <div class="input-group input-group-button">
          <span class="input-group-addon btn btn-primary" id="basic-addon9" onclick="document.getElementById('avatar').click()">
              <input id="avatar" type="file" name="avatar" onchange="document.getElementById('tavatar').value = this.value;" style="display:none">
              <span class="">Upload</span>
          </span>
          <input onclick="document.getElementById('avatar').click()" id="tavatar" type="text" class="form-control" placeholder="Upload Foto">
      </div>
      <span class="messages popover-valid"></span>
    </div>
</div>
