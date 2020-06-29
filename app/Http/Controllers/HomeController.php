<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $userdata = [
            'email'     => $request->email,
            'password'  => $request->password,
            'is_active' => true
        ];

        if(auth()->attempt($userdata)) {

            $roles = auth()->user()->roles;

            foreach($roles as $role) {
                if($role->slug == 'superadmin') {
                    return redirect()->route('admin.index');
                } else {
                    return redirect()->route('platform.browse.index');
                }
            }

        } else {
            return redirect()->route('landing.index')->with('error', 'Onjuiste gebruikergegevens ingevoerd.');
        }
    }
}
