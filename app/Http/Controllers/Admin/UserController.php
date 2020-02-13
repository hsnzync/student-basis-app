<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Role;
use App\Models\Grade;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')
            ->whereHas('roles', function($query) {
                $query->where('slug', '!=', 'superadmin');
            })
            ->get();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $schools = School::pluck('title', 'id');
        $grades = Grade::pluck('title', 'id');
        return view('admin.user.edit', compact('user', 'schools', 'grades'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $student_role_id = Role::whereSlug('student')->first()->id;

        $user->update($request->all());
        $user->password = Hash::make($request->password);
        $user->roles()->sync( $student_role_id );
        $user->save();

        return redirect()->route('admin.user.edit', $user->id)->with('status','"' . $user->fullname . '"' . ' is bijgewerkt!');
    }

    public function create()
    {
        $user = new User();
        $schools = School::pluck('title', 'id');
        $grades = Grade::pluck('title', 'id');
        return view('admin.user.edit', compact('user', 'schools', 'grades'));
    }

    public function store(CreateUserRequest $request) : RedirectResponse
    {
        $student_role_id = Role::whereSlug('student')->first()->id;

        $user = User::create($request->all());
        $user->password = Hash::make($request->password);
        $user->roles()->attach( $student_role_id );
        $user->save();

        return redirect()->route('admin.user.edit', $user->id)->with('status','"' . $user->fullname . '"' . ' is toegevoegd!');
    }

    public function destroy($id) : RedirectResponse
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('status','"' . $user->fullname . '"' . ' is verwijderd!');
    }
}
