<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'ms_umkm';
    public $timestamps = false;
    protected $primaryKey = 'id_umkm';

    protected $fillable = [
        'nama_umkm',
        'pemilik',
        'alamat_umkm',
        'no_hp',
    ];
    public function kategori()
    {
        return $this->hasMany(Kategori::class);
    }
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
