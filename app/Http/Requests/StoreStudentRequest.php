<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'sex' => 'required|string',
            'age' => 'required|string ',
            'student_class_id' => 'required|integer',
            'user_type' => 'required|string',
            'address' => 'required|string',
            'grade' => 'required|string',
            'password' => 'required|string|min:6'
            
        ];
    }
}
