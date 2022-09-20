<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'id' => 1,
            'slug' => preg_replace("/[^a-zA-Z0-9]/", "", bcrypt(1)),
            'nip' => '5107071126',
            'nama' => 'Cahyanti Wulandari',
            'email' => 'cahyantiwulan2@gmail.com',
            'jk' => 'Perempuan',
            'telepon' => '087122345612',
            'agama' => 'Hindu',
            'jabatan' => 'Guru Akuntansi',
            'alamat' => 'Br. Dinas Geriana Kangin Selat Karangsem'
        ]);
    }
}
