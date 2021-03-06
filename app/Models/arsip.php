<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class arsip extends Model
{
    protected $table = 'arsips';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
      'nama' => 'string',
      'user_id' => 'integer',//pemilik
      'arsip_id' => 'integer',
      'status' => 'integer',
    ];

    protected $fillable = [
      'user_id',
      'arsip_id',
      'nama',
      'status',
    ];

    protected $rules = [
        'arsip_id' => 'required',
        'user_id' => 'required',
        'nama' => 'required',
        'status' => 'required',
    ];

    public function arsip($value='')
    {
        return $this->hasOne(arsip::class,'id','arsip_id');
    }

    public function arsips($value='')
    {
        return $this->hasMany(arsip::class,'arsip_id','id');
    }

    public function user($value='')
    {
        return $this->hasOne('App\user','id','user_id');
    }

    public function arsipsurat($value='')
    {
        return $this->hasMany(arsip_surat::class,'arsip_id','id');
    }
}
