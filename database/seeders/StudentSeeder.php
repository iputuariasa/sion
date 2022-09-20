<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'id' => 1,
            'mclass_id' => 1,
            'slug' => preg_replace("/[^a-zA-Z0-9]/", "", bcrypt(1)),
            'nis' => '0001',
            'nama' => 'I Putu Ariasa',
            'email' => 'iputuariasa75@gmail.com',
            'jk' => 'Laki-laki',
            'telepon' => '081234567890',
            'nama_ayah' => 'I Putu Sutarjaya',
            'nama_ibu' => 'Ni Wayan Darmiati',
            'agama' => 'Hindu',
            'tgl_lahir' => '2000-06-11',
            'tempat_lahir' => 'Selat',
            'alamat' => 'Br.Tukad Sabuh, Duda Utara, Selat, Karangasem, Bali'
        ]);
    }
}
