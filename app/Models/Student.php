<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\User;
use App\Models\Classes;
use App\Models\Courses;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class Student extends Model
{
    use HasFactory;

    protected $table = 'students';


    protected $withCount = ['user', 'courses'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        /*'class_id',*/   
    ];


    //this is a one-TO-one relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //classes for student
    //this is a one-TO-many relationship
    public function class(){
        return $this-> belongsTo(Classes::class)->with('courses');
    }

    //course for student
    //this is a many-TO-many relationship has pivot table courses_students
    public function courses(){

        return $this->belongsToMany(Courses::class, 'courses_students')->withTimestamps();

    }

    
}
