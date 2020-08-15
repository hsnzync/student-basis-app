<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
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
                    return redirect()->route('platform.dashboard.index');
                }
            }

        } else {
            return redirect()->route('landing.index')->with('error', 'Onjuiste gebruikergegevens ingevoerd.');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('landing.index');
    }
}
