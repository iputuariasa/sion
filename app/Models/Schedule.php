<?php

namespace App\Models;

use App\Models\Study;
use App\Models\Teacher;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters){
        // $query->when($filters['search'] ?? false, function($query, $search){
        //     return $query->where('title', 'like', '%' . $search . '%')
        //             ->orWhere('body', 'like', '%' . $search . '%');
        // });

        $query->when($filters['mclass'] ?? false, function($query, $mclass){
            return $query->whereHas('mclass', function($query) use ($mclass) {
                $query->where('kode_kelas', $mclass);
            });
        });
    }

    public function getRouteKeyName()
    {
        return 'kode_jadwal';
    }

    // public function dataSchedules(){
    //     return DB::table('teachers')
    //                 ->join('kelas', 'teachers.id', '=', 'kelas.teacher_id')
    //                 ->get();
    // }

    // public function studies()
    // {
    //     return $this->belongsToMany(Study::class, 'schedules', 'study_id', 'teacher_id');
    // }

    public function study()
    {
        return $this->belongsTo(Study::class, 'study_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    // public function teachers()
    // {
    //     return $this->belongsToMany(Teacher::class, 'schedules', 'study_id', 'teacher_id');
    // }
    
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function schoolYear()
    {
        return $this->belongsTo(schoolYear::class, 'schoolYear_id');
    }

    public function mclass()
    {
        return $this->belongsTo(Mclass::class, 'mclass_id');
    }

    public function day(){
        return $this->belongsTo(Day::class, 'day_id');
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
