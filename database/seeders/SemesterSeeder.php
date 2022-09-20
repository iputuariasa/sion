<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester::create([
            'semester' => 'Ganjil',
            'status' => 'Aktif'
        ]);

        Semester::create([
            'semester' => 'Genap',
            'status' => 'Nonaktif'
        ]);
    }
}
