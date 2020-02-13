<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Achievement;
use Image;

class AccountController extends Controller
{
    public function index()
    {
        $user = User::with('school')->where('id', Auth::user()->id)->firstOrfail();
        // $achievements = Achievement::

        return view('platform.account.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('platform.account.edit', compact('user'));
    }

    public function update(Request $request, User $user) : RedirectResponse
    {
        $users = User::where('id', Auth::user()->id)->get();

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/uploads/avatars/'. $filename));
            $user->avatar = $filename;
        }
        $user->update($request->all());

        return redirect()->route('platform.account.index', compact('users'))->with('status', 'Profile information has been updated');
    }
}
