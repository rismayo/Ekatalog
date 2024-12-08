<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Umkm;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'ms_kategori';
    public $timestamps = false;
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'id_kategori',
        'id_umkm',
        'nama_kategori',
    ];
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'id_umkm', 'id_umkm');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }
}