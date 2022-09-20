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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('admin_id')->nullable()->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('teacher_id')->nullable()->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->string('kode_login')->unique();
            $table->string('foto')->default('user-image/user.png');
            $table->string('slug')->unique();
            $table->string('password');
            $table->enum('role',['student', 'teacher', 'admin']);
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
        Schema::dropIfExists('users');
    }
};
