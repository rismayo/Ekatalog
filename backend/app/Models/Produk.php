<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'ms_produk';
    public $timestamps = false;
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_produk',
        'id_user',
        'id_kategori',
        'id_umkm',
        'nama_produk',
        'deskripsi_produk',
        'harga_produk',
        'foto_produk',
        'status',
    ];
}
