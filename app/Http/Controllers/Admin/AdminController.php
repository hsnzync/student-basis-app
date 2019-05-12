<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Programme;
use App\Models\Subject;
use App\Models\Course;

class AdminController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $school_count = School::count();
        $programme_count = Programme::count();
        $subject_count = Subject::count();
        $course_count = Course::count();

        foreach(Auth::user()->roles as $role) {
            if($role->id == 2) {
                return view('admin.home.index', compact('user_count', 'school_count', 'programme_count', 'subject_count', 'course_count'));
            }
            else {
                return back();
            }
        }
    }
}
