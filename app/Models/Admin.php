<?php

namespace App\Models;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $guarded = [''];

    // public function user(){
    //     return $this->hasOne(User::class);
    // }

    public function user()
    {
        return $this->hasOne(User::class, 'admin_id');
    }
}
