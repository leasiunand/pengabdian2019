<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    protected $table = 'masuks';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
      'surat_id' => 'integer',
      'user_id' => 'integer',
      'pengirim' => 'string',
    ];

    protected $fillable = [
      'surat_id',
      'user_id',
      'pengirim',
    ];

    protected $rules = [
        'surat_id' => 'required|unique:masuks,user_id|unique:keluars,user_id',
        'user_id' => 'required',
        'pengirim' => 'required',
    ];

    public function surat($value='')
    {
        return $this->hasOne(surat::class,'id','surat_id');
    }

    public function penerima($value='')
    {
        return $this->hasOne('App\User','id','user_id');
    }

}
