<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::withCount('students')->get();

        foreach($courses as $course) {

            $course->avaialable = $course->students_count < $course->capacity ?'Yes': 'No';
        }

        return response()->json(['courses' => $courses ], 200);
    }

    /**
     * Register a course.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerCourse(Request $request, $student_id, $course_id)
    {

        $student = Student::findOrFail($student_id);
        $course = Course::findOrFail($course_id);

        if($student->courses()->where( 'courses.id', $course->id)->exists()){
            return response()->json(['message' => 'Student already registered this course' ], 405);
        }
        if($course->students()->count() >= $course->capacity){
            return response()->json(['message' => 'Course is not avaialable' ], 405);
        }

        $student->courses()->attach($course_id);

        return response()->json(['message' => 'Student registered successfully' ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
