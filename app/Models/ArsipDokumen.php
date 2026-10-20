<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipDokumen extends Model
{
    protected $table = 'arsip_dokumen';

    protected $fillable = [
        'akta_id',
        'nama_dokumen',
        'jenis_dokumen',
        'file',
        'keterangan',
    ];

    public function akta()
    {
        return $this->belongsTo(Akta::class);
    }
}