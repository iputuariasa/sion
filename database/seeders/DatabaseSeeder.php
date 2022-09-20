<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);
        
        User::create([
            'slug' => preg_replace("/[^a-zA-Z0-9]/", "", bcrypt(1)),
            'password' => bcrypt('12345'),
            'nama' => 'Admin Stikar 0',
            'kode_login' => '5107070611',
            'admin_id' => '1',
            'role' => 'admin',
        ]);

        User::create([
            'slug' => preg_replace("/[^a-zA-Z0-9]/", "", bcrypt(1)),
            'password' => bcrypt('12345'),
            'nama' => 'Cahyanti Wulandari',
            'kode_login' => '5107071126',
            'teacher_id' => '1',
            'role' => 'teacher',
        ]);

        User::create([
            'slug' => preg_replace("/[^a-zA-Z0-9]/", "", bcrypt(1)),
            'password' => bcrypt('12345'),
            'nama' => 'I Putu Ariasa',
            'kode_login' => '0001',
            'student_id' => '1',
            'role' => 'student',
        ]);

        
        $this->call(SemesterSeeder::class);
        $this->call(SchoolYearSeeder::class);
        $this->call(StudySeeder::class);
        $this->call(MclassSeeder::class);
        $this->call(DaySeeder::class);



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
