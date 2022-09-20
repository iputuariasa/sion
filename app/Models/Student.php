<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('nis', 'like', '%' . $search . '%')
                    ->orwhere('nama', 'like', '%' . $search . '%')
                    ->orwhere('email', 'like', '%' . $search . '%');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function user(){
    //     return $this->hasOne(User::class);
    // }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function class(){
        return $this->belongsTo(Mclass::class, 'mclass_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
