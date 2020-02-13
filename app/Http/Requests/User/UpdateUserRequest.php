<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|email',
            'level'             => 'required|digits_between:1,50',
            'password'          => 'required|min:6',
            'password-confirm'  => 'required|same:password',
            'experience_points' => 'required|digits_between:0,5000',
            'school_id'         => 'required',
            'grade_id'          => 'required',
        ];
    }
}
