<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', true)
            ->orderBy('order')
            ->get();
        $courses = Course::latest()->take(3)->get();
        return view('home', compact('banners', 'courses'));
    }
}
