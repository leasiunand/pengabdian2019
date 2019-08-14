<div class="form-group row p-t-20 p-b-40">
    <div class="col-sm-12">
        {!! Form::select('user_id', $user ,null,['class' => 'form-control form-control-info', 'placeholder'=>'Penerima']) !!}
        <span class="messages popover-valid"></span>
    </div>
</div>
{!! Form::hidden('surat_id', $keluar->surat_id,['class' => 'form-control']) !!}
