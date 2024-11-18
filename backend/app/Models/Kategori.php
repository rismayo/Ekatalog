<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}