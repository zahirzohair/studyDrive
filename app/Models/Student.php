<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;


class Student extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'email',
    	'password'
    ];

    public function courses(){
    	return $this->belongsToMany('App\Models\Course', 'course_students');
    }

}
