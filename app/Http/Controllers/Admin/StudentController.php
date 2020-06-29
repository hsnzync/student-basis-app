<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Student\CreateStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Status;
use Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::orderBy('id', 'asc')
            ->whereHas('roles', function($query) {
                $query->where('slug', '=', 'student');
            })
            ->get();
        return view('admin.student.index', compact('students'));
    }

    public function edit(User $student)
    {
        $schools = School::pluck('title', 'id');
        return view('admin.student.edit', compact('student', 'schools'));
    }

    public function update(UpdateStudentRequest $request, User $student): RedirectResponse
    {
        $student_role_id = Role::whereSlug('student')->first()->id;
        $fname_short = substr($request->first_name, 0, 1);
        $lname_short = substr($request->last_name, 0, 1);

        $student->update($request->all());
        $student->password = Hash::make($request->password);
        $student->short_name = $fname_short . $lname_short;
        $student->roles()->sync( $student_role_id );
        $student->save();

        return redirect()->route('admin.student.edit', $student->id)->with('success', $student->fullname . ' is bijgewerkt.');
    }

    public function create()
    {
        $student = new User();
        $schools = School::pluck('title', 'id');
        return view('admin.student.edit', compact('student', 'schools'));
    }

    public function store(CreateStudentRequest $request) : RedirectResponse
    {
        $student_role_id = Role::whereSlug('student')->first()->id;
        $fname_short = substr($request->first_name, 0, 1);
        $lname_short = substr($request->last_name, 0, 1);

        $subjects = Subject::get();
        $status_available = Status::whereSlug('available')->first()->id;

        $student = User::create($request->all());
        $student->password = Hash::make($request->password);
        $student->short_name = $fname_short . $lname_short;
        $student->roles()->attach( $student_role_id );
        $student->subjects()->attach( $student_role_id );
        $student->save();

        foreach($subjects as $subject) {
            // add subject and status to pivot
            $student->subjects()->attach([ 1 => ['subject_id' => $subject->id, 'status_id' => $status_available]]);
        }

        return redirect()->route('admin.student.edit', $student->id)->with('success', $student->fullname . ' is toegevoegd.');
    }

    public function destroy($id) : RedirectResponse
    {
        $student = User::find($id);
        $student->delete();

        return redirect()->route('admin.student.index')->with('error', $student->fullname . ' is verwijderd.');
    }
}
