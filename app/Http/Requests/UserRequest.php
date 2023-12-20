<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->routeIs('user.store'))
        {
            return [
                'name' => 'required|string|max:25|unique:users,name',
                'email' => 'required|email:rfc,dns|unique:users,email',
                'phone' => 'required|digits:11',
                'address' => 'required|string|min:3|max:100',
                'city' => 'required|min:3|max:100',
                'country' => 'required|min:3|max:100',
                'password' => 'required|min:6|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d!$#%])[^\s]{6,}$/'
            ];
        }

        if($this->routeIs('user.update'))
        {
            $userId = $this->route('id');

            return [
                'name' => 'required|string|max:25|unique:users,name,' . $userId,
                'email' => 'required|email:rfc,dns|unique:users,email,' . $userId,
                'phone' => 'required|digits:11',
                'address' => 'required|min:3|max:100',
                'city' => 'required|min:3|max:100',
                'country' => 'required|min:3|max:100',
                'password' => 'required|min:6|regex:/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d!$#%])[^\s]{6,}$/'
            ];
        }
       
    }

    public function messages()
    {
        return [
            'password.regex' => [
                'The password must be at least 6 characters long', 
                'and contain at least one letter', 
                'one digit', 
                'and one of the following special characters: !, $, #, or %.'
            ],
        ];
    }
}
