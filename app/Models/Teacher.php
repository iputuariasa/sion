<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, function($query, $search){
            return $query->where('nip', 'like', '%' . $search . '%')
                    ->orwhere('nama', 'like', '%' . $search . '%')
                    ->orwhere('jabatan', 'like', '%' . $search . '%');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function mclass(){
        return $this->hasOne(Mclass::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
