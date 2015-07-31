<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'name'      => 'required',
            'username'  => 'required|unique:users',
            'email'      => 'required|unique:users|email',
            'password'      => 'required|min:6',
            'password_again'      => 'required|same:password',

        ];
    }
}
