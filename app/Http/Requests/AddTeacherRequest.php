<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTeacherRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255|regex:/^[\p{L}\s]+$/u',
            'email' => 'required|email|unique:teachers,email',
            'age' => 'required|integer|min:1|max:150',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:m,f',
            'phone'=> 'required|string|max:20',
            'image' => 'nullable|image|mimes:png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please write teacher name',
            'age.max' => 'Teacher can not be older than 100',
            'name.regex' => 'Name must only contain letters and spaces.',
            'phone.max'=> 'Phone number can not be longer than 20 characters',
        ];
    }
}
