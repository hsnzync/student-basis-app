<?php

namespace App\Http\Controllers\Auth;

use Mail;

use App\Models\User;
use App\Models\School;
use App\Models\Role;
use App\Mail\SendRegistrationMail;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/browse';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password'          => ['required', 'string', 'min:4', 'confirmed'],
            'school_id'         => ['required'],
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $schools = School::active()->orderBy('title')->pluck('title', 'id');
        return view('auth.register', compact('schools'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $student_role_id = Role::whereSlug('student')->first()->id;

        $user = User::create([
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'experience_points' => 0
        ]);

        $user->roles()->attach( $student_role_id );

        // Send user email after registration
        // Mail::to( $user->email )->send( new SendRegistrationMail( $user ));

        return $user;
    }
}
