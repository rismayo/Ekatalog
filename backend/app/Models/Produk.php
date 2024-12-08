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

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'id_umkm', 'id_umkm');
    }
    public function superadmin()
    {
        return $this->belongsTo(Superadmin::class, 'id_user', 'id_user');
    }
}