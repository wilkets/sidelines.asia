<?php

namespace sidelines\Http\Requests;

use sidelines\Http\Requests\Request;

class StudentEditProfileRequest extends Request
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
        $user_type = \Auth::user()->user_type;
        // dd($user_type);
        return [
            'file'      => 'image|mimes:jpg,jpeg,png',
            'dob'       => 'date_format:Y-m-d',
        ];
    }
}
