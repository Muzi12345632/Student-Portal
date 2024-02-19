<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'course_code',
        'teacher_id',
        'class_id',
    ];

    //course for class
    public function class(){
        return $this-> belongsTo(Classes::class)->select('id','class_name');
    }


    //course has many students
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }


    //course has one teacher
    public function teacher ()
    {
        return $this->belongsTo(Teacher::class)->select('id','name');
    }


}
