<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Subject;
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

    public function login(Request $request)
    {
        $userdata = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if( auth()->attempt($userdata) ) {

            $roles = auth()->user()->roles;

            foreach($roles as $role) {
                if($role->slug == 'superadmin') {
                    return redirect()->route('admin.index');
                } else {
                    return redirect()->route('platform.browse.index', ['id' => auth()->user()->id]);
                }
            }

        } else {
            return redirect()->route('landing.index')->with('status', 'Account bestaat niet in ons systeem!');
        }
    }
}
