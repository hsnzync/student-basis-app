<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class OverviewController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::orderBy('created_at', 'asc')->orderBy('id')->active()->get();

        $first_name_short = substr(auth()->user()->first_name, 0, 1);
        $last_name_short = substr(auth()->user()->last_name, 0, 1);
        $user_initials = $first_name_short . $last_name_short;

        return view('platform.overview.index', compact('subjects', 'user_initials'));
    }
}
