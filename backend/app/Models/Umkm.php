<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'ms_umkm';

    protected $fillable = [
        'id_umkm',
        'nama_umkm',
        'pemilik',
        'alamat_umkm',
        'no_HP',
    ];
}
