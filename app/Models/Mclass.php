<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mclass extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dataClass(){
        return DB::table('teachers')
                    ->join('kelas', 'teachers.id', '=', 'kelas.teacher_id')
                    ->get();
    }

    public function getRouteKeyName()
    {
        return 'kode_kelas';
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
