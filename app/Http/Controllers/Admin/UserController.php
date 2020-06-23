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
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')
            ->whereHas('roles', function($query) {
                $query->where('slug', '!=', 'student');
            })
            ->get();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $schools = School::pluck('title', 'id');
        $user_role = $user->roles->first()->slug;
        return view('admin.user.edit', compact('user', 'user_role', 'schools'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $superadmin_role_id = Role::whereSlug('superadmin')->first()->id;
        $teacher_role_id = Role::whereSlug('teacher')->first()->id;

        $user->update($request->all());
        $user->password = Hash::make($request->password);
        $user->roles()->sync( $request->is_admin ? $superadmin_role_id : $teacher_role_id );
        $user->save();

        return redirect()->route('admin.user.edit', $user->id)->with('success', $user->fullname . ' is bijgewerkt.');
    }

    public function create()
    {
        $user = new User();
        $schools = School::pluck('title', 'id');
        return view('admin.user.edit', compact('user', 'schools'));
    }

    public function store(CreateUserRequest $request) : RedirectResponse
    {
        $superadmin_role_id = Role::whereSlug('superadmin')->first()->id;
        $teacher_role_id = Role::whereSlug('teacher')->first()->id;

        $user = User::create($request->all());
        $user->password = Hash::make($request->password);
        $user->roles()->attach( $request->is_admin ? $superadmin_role_id : $teacher_role_id );
        $user->save();

        return redirect()->route('admin.user.edit', $user->id)->with('success', $user->fullname . ' is toegevoegd.');
    }

    public function destroy($id) : RedirectResponse
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('error', $user->fullname . ' is verwijderd.');
    }
}
