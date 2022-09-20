<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => 1,
            'slug' => preg_replace("/[^a-zA-Z0-9]/", "", bcrypt(1)),
            'nip' => '5107070611',
            'nama' => 'Admin Stikar 0',
            'email' => 'admin0@gmail.com',
            'jk' => 'Laki-laki',
            'telepon' => '081234567890',
            'agama' => 'Hindu',
            'jabatan' => 'Guru Bahasa Bali',
            'alamat' => 'jl. Untung Surapati 99x-Amlapura'
        ]);
    }
}
