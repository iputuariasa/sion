<?php

namespace Database\Seeders;

use App\Models\schoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        schoolYear::create([
            'tahun_pelajaran' => '2020/2021',
            'status' => 'Aktif'
        ]);

        schoolYear::create([
            'tahun_pelajaran' => '2021/2022',
            'status' => 'Nonaktif'
        ]);

        schoolYear::create([
            'tahun_pelajaran' => '2022/2023',
            'status' => 'Nonaktif'
        ]);
    }
}
