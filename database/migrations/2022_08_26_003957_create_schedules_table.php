<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jadwal')->unique();
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('jamke');
            $table->foreignId('study_id');
            $table->foreignId('teacher_id');
            $table->foreignId('semester_id');
            $table->foreignId('schoolYear_id');
            $table->foreignId('mclass_id');
            $table->foreignId('day_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
