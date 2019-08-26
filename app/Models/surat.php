<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    protected $table = 'surats';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
      'nomor' => 'string',
      'tanggal_surat' => 'date',
      'perihal' => 'string',
      // 'lampiran' => 'string',
      'file' => 'string',
    ];

    protected $fillable = [
      'nomor',
      'tanggal_surat',
      'perihal',
      // 'lampiran',
      'file',
    ];

    private $rules = [
        'nomor' => 'required|unique:surats,nomor',
        'tanggal_surat' => 'required',
        'perihal' => 'required',
        // 'lampiran' => 'required',
        'file' => 'mimes:pdf',
    ];

    public function lampiran($value='')
    {
        return $this->hasMany(lampiran::class,'surat_id','id');
    }

    public function disposisi($value='')
    {
        return $this->hasMany(disposisi::class,'surat_id','id');
    }

    public function masuk(){
      return $this->hasOne(masuk::class,'surat_id','id');
    }

    public function keluar(){
      return $this->hasOne(keluar::class,'surat_id','id');
    }

    



}
