<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'contact_phone',
        'user_type',
        'class_id',
    ];

    // Teacher.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //classes for teacher
    public function classes(){
        return $this->hasMany(Classes::class);
    }

    //teacher has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    
}
