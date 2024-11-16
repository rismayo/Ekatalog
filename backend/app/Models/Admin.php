<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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

}
