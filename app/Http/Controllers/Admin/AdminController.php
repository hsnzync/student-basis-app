<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Subject;
use App\Models\Course;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('id')->get();
        $subjects = Subject::orderBy('id')->get();
        $courses = Course::orderBy('id')->get();

        $students = User::orderBy('id', 'asc')
            ->whereHas('roles', function($query) {
                $query->where('slug', '=', 'student');
            })
            ->get();

        return view('admin.index', compact('schools', 'subjects', 'courses', 'students'));
    }
}
