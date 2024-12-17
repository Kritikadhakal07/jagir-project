<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'first_name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[0-9]/', // At least one digit
                'regex:/[@$!%*?&]/', // At least one special character
            ],
            'password_confirmation' => 'required|same:password',
        ];
    }
    
  
    public function messages()
    {
        return [
            'first_name.required' => 'Please provide your first name.',
            'last_name.required' => 'Please provide your last name.',
            'date_of_birth.required' => 'Please provide your date of birth.',
            'date_of_birth.before' => 'The date of birth must be before today.',
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Gender must be either Male, Female, or Other.',
            'email.required' => 'Please provide your email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please create a password.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must include uppercase, lowercase, a number, and a special character.',
            'password_confirmation.same' => 'Password confirmation does not match.',
        ];
    }
    

   

    
}
