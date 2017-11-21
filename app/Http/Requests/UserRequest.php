<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserRequest extends FormRequest
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
        if(Route::currentRouteName() == 'user.store') {
            return [
                'name' => 'required',
                'email' => 'required|max:191|unique:users',
                'password' => 'required|min:4|confirmed',
                'user_type_id' => 'required'
            ];
        } else if(Route::currentRouteName() == 'user.update') {
            return [
                'name' => 'required',
                'user_type_id' => 'required'
            ];
        }
        return [

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter user name',
            'email.required' => 'Please enter email address',
            'email.unique' => 'Email address has already taken',
            'password.required' => 'Please enter user\'s password',
            'password.min:4' => 'At least 4 character are required for password',
            'user_type_id.required' => 'Please select user type'
        ];
    }
}
