<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class OverviewController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::orderBy('created_at', 'asc')->orderBy('id')->active()->get();

        return view('platform.overview.index', compact('subjects'));
    }
}
