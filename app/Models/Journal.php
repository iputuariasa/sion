<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('tanggal', 'like', '%' . $search . '%')
                    ->orwhere('pertemuan_ke', 'like', '%' . $search . '%')
                    ->orwhere('kode_jurnal', 'like', '%' . $search . '%')
                    ->orwhere('materi', 'like', '%' . $search . '%');
        });
    }

    public function getRouteKeyName()
    {
        return 'kode_jurnal';
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
