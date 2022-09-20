<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Study::create([
            'kode_mapel' => 'MP-1660957067',
            'mapel' => 'Bahasa Indonesia'
        ]);

        Study::create([
            'kode_mapel' => 'MP-1660957068',
            'mapel' => 'Bahasa Bali'
        ]);

        Study::create([
            'kode_mapel' => 'MP-1660957069',
            'mapel' => 'Bahasa Jepang'
        ]);

        Study::create([
            'kode_mapel' => 'MP-1660957070',
            'mapel' => 'Pemrograman Web'
        ]);
    }
}
