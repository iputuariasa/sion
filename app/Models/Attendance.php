<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function schedule()
    // {
    //     return $this->belongsTo(Schedule::class, 'schedule_id');
    // }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class, 'student_id');
    // }

    // public function journal()
    // {
    //     return $this->belongsTo(Journal::class, 'journal_id');
    // }

    public function journals()
    {
        return $this->belongsToMany(Journal::class, 'attendances');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
