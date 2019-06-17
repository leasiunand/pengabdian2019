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
      'lampiran' => 'string',
      'file' => 'string',
    ];

    protected $fillable = [
      'nomor',
      'tanggal_surat',
      'perihal',
      'lampiran',
      'file',
    ];

    protected $rules = [
        'nomor' => 'required|unique:surats,nomor',
        'tanggal_surat' => 'required',
        'perihal' => 'required',
        'lampiran' => 'required',
        'file' => 'required',
    ];
}
