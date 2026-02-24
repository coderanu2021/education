<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        $courses = Course::all();
        return view('students.register', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'qualification' => 'nullable|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Student::create($validated);

        return redirect()->route('students.register')
            ->with('success', 'Registration submitted successfully! We will contact you soon.');
    }
}
