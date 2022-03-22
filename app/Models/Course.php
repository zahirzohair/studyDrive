<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class Course extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
    	'name',
    	'capacity'
    ];

    public function students(){
    	return $this->belongsToMany('App\Models\Student', 'course_students');
    }

}
