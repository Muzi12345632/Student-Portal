<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Classes;
use App\Models\Courses;
use App\Models\Teacher;
use App\Models\Student;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';


    //protected $withCount = ['students'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'course_code',
        
    ];

    //course for class
    //this is a one-TO-many relationship
    public function class(){
        return $this-> belongsTo(Classes::class);
    }


    //course has many students
    //this is a many-TO-many relationship pivot table courses_students
    public function students()
    {
        return $this->belongsToMany(Student::class, 'courses_students')->withTimestamps();
    }


    //course has one teacher
    //this is a one-TO-many relationship
    public function teacher ()
    {
        return $this->belongsTo(Teacher::class);
    }


}
