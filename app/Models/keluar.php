<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keluar extends Model
{
    protected $table = 'keluars';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
      'surat_id' => 'integer',
      'penerima' => 'string',
    ];

    protected $fillable = [
      'surat_id',
      'penerima',
    ];

    protected $rules = [
        'surat_id' => 'required|unique:masuks,user_id|unique:keluars,user_id',
        'penerima' => 'required',
    ];

    public function surat($value='')
    {
        return $this->hasOne(surat::class,'id','surat_id');
    }

}
