<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Programme;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $schools = School::pluck('title', 'id');
        $programmes = Programme::pluck('title', 'id');
        return view('admin.user.edit', compact('user', 'schools', 'programmes'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->all());
        return redirect()->route('user.edit', $user->id)->with('status', '"' . $user->username . '" is bijgewerkt!');
    }

    public function create()
    {
        $user = new User();
        $schools = School::pluck('title', 'id');
        $programmes = Programme::pluck('title', 'id');
        return view('admin.user.edit', compact('user', 'schools', 'programmes'));
    }

    public function store(UserRequest $request) : RedirectResponse
    {
        $user = User::create($request->all());
        return redirect()->route('user.edit', $user->id)->with('status', '"' . $user->username . '" is toegevoegd!');
    }


    public function destroy($id) : RedirectResponse
    {
        $user = School::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('status', '"' . $user->title . '" is verwijderd!');
    }
}