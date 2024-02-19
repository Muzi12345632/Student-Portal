<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        /*'class_id',*/   
    ];

    //reomve password,name,email,user_type field add contact_phone, user_id field

    // Student.php
    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'role_id', 'name', 'email');
    }


    //classes for student
    public function class(){
        return $this-> belongsTo(Classes::class)->select('id','class_name');
    }

    
}
