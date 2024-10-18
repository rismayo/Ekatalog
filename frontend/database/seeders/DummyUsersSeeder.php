<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_user'=>'1',
                'id_umkm'=>'1',
                'nama_user'=> 'agungprasetyo',
                'email'=>'agungpras@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>'Superadmin',
                'status'=>'Aktif'
            ],
            [
                'id_user'=>'2',
                'id_umkm'=>'2',
                'nama_user'=> 'rahmadina',
                'email'=>'rahmadina@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>'Admin',
                'status'=>'Aktif'
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
