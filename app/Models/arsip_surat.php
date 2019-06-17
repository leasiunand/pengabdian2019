<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class arsip_surat extends Model
{
    protected $table = 'arsip_surats';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
      'surat_id' => 'integer',
      'tanggal' => 'date',
      'arsip_id' => 'integer',
    ];

    protected $fillable = [
      'surat_id',
      'tanggal',
      'arsip_id',
    ];

    protected $rules = [
        'arsip_id' => 'required',
        'surat_id' => 'required',
        'date' => 'required',
    ];

    public function arsip($value='')
    {
        return $this->hasOne(surat::class,'id','arsip_id');
    }

    public function surat($value='')
    {
        return $this->hasOne(surat::class,'id','surat_id');
    }
}
