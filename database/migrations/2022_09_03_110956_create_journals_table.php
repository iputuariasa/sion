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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id');
            $table->foreignId('teacher_id');
            $table->string('kode_jurnal')->unique();
            $table->string('materi');
            $table->string('ket');
            $table->string('pertemuan_ke');
            $table->date('tanggal');
            $table->enum('statusInput', [0,1])->default(0);
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
        Schema::dropIfExists('journals');
    }
};
