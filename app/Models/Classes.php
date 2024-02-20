<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class_name',
    ];

    public function teacher(){
        return $this->hasMany(Teacher::class)->select('user_id','name','biography');
    }

    public function students(){
        return $this->hasMany(Student::class)->select('user_id','name','age','contact_phone','address');
    }

    public function courses()
    {
        return $this->hasMany(Courses::class)->select('name','course_code');
    }
}
