<?php

namespace App\Models;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Study extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
