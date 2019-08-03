<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
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
            'student_number'    => 'required|unique:user,student_number,' . $this->route('user')->id,
            'email'             => 'required|email',
            'level'             => 'required|digits_between:1,50',
            'experience_points' => 'required|digits_between:0,5000',
            'school_id'         => 'required',
            'programme_id'      => 'required',
        ];
    }
}