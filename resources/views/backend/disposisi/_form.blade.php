<div class="form-group row p-t-20 p-b-40">
    <label class="col-sm-2 social-label b-none p-t-0">Penerima</label>
    <div class="col-sm-6">
        {!! Form::select('user_id', $user ,null,['class' => 'form-control form-control-info', 'placeholder'=>'Penerima']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 social-label b-none p-t-0">Catatan</label>
    <div class="col-sm-10">
        {!! Form::textArea('catatan', null,['class' => 'form-control', 'placeholder'=>'Catatan']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>

