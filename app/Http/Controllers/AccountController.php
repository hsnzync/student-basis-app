<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Programme;
use App\Models\Achievement;
use Image;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::with('school')->where('id', Auth::user()->id)->get();
        // $achievements = Achievement::

        return view('account.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('account.edit', compact('user'));
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

        return redirect()->route('account.index', compact('users'))->with('status', 'Profile information has been updated');
    }

    public function registerSchool()
    {
        $schools = School::orderBy('title', 'asc')->get();
        return view('auth.steps.school', compact('schools'));
    }

    public function postSchool(Request $request) : RedirectResponse
    {
        $user = User::where('id', auth()->user()->id)->firstOrFail();
        $user->school_id = $request->school_id;
        $user->save();

        return redirect()->route('account.programme');
    }

    public function registerProgramme()
    {
        $programmes = Programme::orderBy('title', 'asc')->where('school_id', auth()->user()->school_id)->get();
        return view('auth.steps.programme', compact('programmes'));
    }

    public function postProgramme(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->firstOrFail();
        $user->programme_id = $request->programme_id;
        $user->save();

        $programmes = Programme::with('subjects', 'subjects.courses')->where('id', $user->programme_id)->get();

        return redirect()->route('browse.index');
    }
}
