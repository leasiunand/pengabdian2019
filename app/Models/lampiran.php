<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lampiran extends Model
{
    protected $table = 'lampirans';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
      'surat_id' => 'integer',
      'nama' => 'string',
      'file' => 'string',
    ];

    protected $fillable = [
      'surat_id',
      'nama',
      'file',
    ];

    protected $rules = [
        'surat_id' => 'required',
        'file' => 'required',
        'nama' => 'required',
    ];

    public function surat($value='')
    {
        return $this->hasOne(surat::class,'id','surat_id');
    }
}
