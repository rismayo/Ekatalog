<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    use HasFactory;

    protected $table = 'ms_user';
    public $timestamps = false;
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'id_user',
        'id_umkm',
        'nama_user',
        'email',
        'password',
        'level',
        'status',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

}
