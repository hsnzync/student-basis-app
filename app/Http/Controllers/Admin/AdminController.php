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
        return view('admin.home.index');
    }
}
