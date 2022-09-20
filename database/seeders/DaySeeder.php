<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create([
            'hari' => 'Senin',
        ]);

        Day::create([
            'hari' => 'Selasa',
        ]);

        Day::create([
            'hari' => 'Rabu',
        ]);

        Day::create([
            'hari' => 'Kamis',
        ]);

        Day::create([
            'hari' => 'Jumat',
        ]);

        Day::create([
            'hari' => 'Sabtu',
        ]);

        Day::create([
            'hari' => 'Minggu',
        ]);
    }
}
