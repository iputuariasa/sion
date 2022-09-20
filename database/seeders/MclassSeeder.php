<?php

namespace Database\Seeders;

use App\Models\Mclass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mclass::create([
            'teacher_id' => 1,
            'kode_kelas' => 'KL-123456789',
            'nama_kelas' => 'X MM'
        ]);
    }
}
