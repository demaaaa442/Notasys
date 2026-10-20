<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\ArsipDokumen;

class Akta extends Model
{
    protected $fillable = [
        'client_id',
        'nomor_akta',
        'jenis_akta',
        'tanggal_akta',
        'status',
        'keterangan',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function arsipDokumen()
    {
        return $this->hasMany(ArsipDokumen::class);
    }
}