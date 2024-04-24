<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\Student;
use App\Models\Teacher;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    //protected $withCount = ['students'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class_name',
    ];


    //this is a many-TO-many relationship pivot table classes_teacher
    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'classes_teachers')->withTimestamps();
    }


    //this is a one-TO-many relationship
    public function students(){
        return $this->hasMany(Student::class)->with('user');
    }


    //this is a one-TO-many relationship
    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
}
