<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\School;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index(Request $request) 
    {
        $schools = School::with('programmes', 'programmes.subjects')->where('id', auth()->user()->school_id)->get();

        if($schools) {
            return view('programme.index', compact('schools'));
        } else {
            abort(400);
        }
    }
}
