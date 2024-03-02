<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 1;
    const STUDENT = 2;
    const TEACHER = 3;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
