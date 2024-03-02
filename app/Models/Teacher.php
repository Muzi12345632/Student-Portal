<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;
use App\Models\Classes;
use App\Models\Courses;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $withCount = ['courses', 'classes'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'user_id',
        'biography',
    ];

    // Teacher.php
    //this is a one-TO-one relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //this is a one-TO-Many relationship 
    public function courses()
    {
        return $this->hasManyThrough(Courses::class,Classes::class);
    }

    //classes for teacher
    //this is a many-TO-many relationship has a pivot table classes_teacher
    public function class(){
        return $this->belongsToMany(Classes::class, 'classes_teachers')->withTimestamps();
    }

    //teacher has many students
    /*public function students()
    {
        return $this->hasMany(User::class)->where('role_id', Role::STUDENT);
    }*/
    
}
