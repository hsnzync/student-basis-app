<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\School;
use App\Models\Subject;
use App\Models\Newsletter;
use App\Http\Requests\NewsletterRequest;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subjects = Subject::orderBy('id', 'asc')->active()->take(3)->get();

        return view('index', compact('subjects'));
    }

    public function create(NewsletterRequest $request) : RedirectResponse
    {
        $newsletter = new Newsletter();
        $newsletter->create(['email' => $request->email]);

        return back();
    }
}
