<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(12);
        return view('courses.index', compact('courses'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('courses.show', compact('course'));
    }
}
