<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->firstOrFail();

        $subjects = Subject::where('programme_id', $user->programme_id)->get();
        return view('subject.index', compact('subjects'));
    }
}
