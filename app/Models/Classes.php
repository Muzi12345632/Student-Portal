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
        'name',
        //'teacher_id',
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function courses()
    {
        return $this->hasMany(Courses::class)->select('id', 'name','course_code');
    }
}
