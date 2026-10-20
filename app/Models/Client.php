<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'telepon',
        'alamat',
    ];    

    public function aktas()
    {
        return $this->hasMany(Akta::class);
    }
}
