<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'alamat' => 'Kota Probolinggo',
            'tanggal_lahir' => '2001-06-20',
            'jenis_kelamin' => 'Laki-laki',
            'gambar' => 'fotoUser/rozak.jpg',
            'remember_token' => Str::random(),
        ]);
    }
}
