<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Programme;

class SchoolController extends Controller
{
    public function index() 
    {
        $schools = School::orderBy('title', 'asc')->get();
        return view('school.index', compact('schools'));
    }
}
