<?php

namespace sidelines\Http\Requests;

use sidelines\Http\Requests\Request;

class UserFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::check())
        {
            return true;
        }
        else
        {
            return false;
        }
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

        if($user_type === 's')
        {
            return [
                        'fname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                        'lname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                        'mname' => 'max:255|alpha',
                         'file' => 'image|mimes:jpg,jpeg,png',
                   'contact_no' => 'regex:/^[-0-9\+]+$/',
                'date_of_birth' => 'required|date_format:Y-m-d',
                    'school_id' => 'required|exists:schools,id',
                    'degree_id' => 'required|exists:degrees,id',
            ];
        }
        else if($user_type === 'sa')
        {
            return [
                   'file' => 'image|mimes:jpg,jpeg,png',
                   'name' => 'required',
                 'tel_no' => 'regex:/^[-0-9\+]+$/',
                'address' => 'required',
                'country' => 'alpha',
                'website' => 'url',
            ];
        }
        else if($user_type === 'c')
        {
            return [
                   'file' => 'image|mimes:jpg,jpeg,png',
                   'name' => 'required',
                 'tel_no' => 'regex:/^[-0-9\+]+$/',
                'address' => 'required',
                'country' => 'alpha',
                'website' => 'url',
            ];
        }
        else if($user_type === 'd')
        {
            return [
                         'file' => 'image|mimes:jpg,jpeg,png',
                        'fname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                        'lname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                        'mname' => 'max:255|alpha',
                   'contact_no' => 'regex:/^[-0-9\+]+$/',
                'date_of_birth' => 'required|date_format:Y-m-d',
            ];
        }
        else if($user_type === 'f')
        {
            return [
                         'file' => 'image|mimes:jpg,jpeg,png',
                        'fname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                        'lname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                        'mname' => 'max:255|alpha',
                   'contact_no' => 'regex:/^[-0-9\+]+$/',
                'date_of_birth' => 'required|date_format:Y-m-d',
            ];
        }
    }
}
