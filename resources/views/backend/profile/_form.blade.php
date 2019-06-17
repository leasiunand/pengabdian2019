<div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">Password Lama</label>
    <div class="col-sm-10">
        {!! Form::password('password_lama', ['class' => 'form-control', 'placeholder'=>'Password Lama']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Password Baru</label>
    <div class="col-sm-10">
        {!! Form::password('password_baru', ['class' => 'form-control', 'placeholder'=>'Password Baru']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
    <div class="col-sm-10">
        {!! Form::password('confirm_password_baru', ['class' => 'form-control', 'placeholder'=>'Konfirmasi Password Baru']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>
