<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class disposisi extends Model
{
    protected $table = 'disposisis';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
      'surat_id' => 'integer',
      'user_id' => 'integer',
    ];

    protected $fillable = [
      'surat_id',
      'user_id',
    ];

    protected $rules = [
        'surat_id' => 'required',
        'user_id' => 'required',
    ];

    public function surat($value='')
    {
        return $this->hasOne(surat::class,'id','surat_id');
    }

    public function user($value='')
    {
        return $this->hasOne('App\user','id','user_id');
    }
}
