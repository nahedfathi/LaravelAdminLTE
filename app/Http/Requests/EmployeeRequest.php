<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email',
            'phone' => 'required'
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'email.email' => 'The field should be real email.',
    //         'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
    //         'website.url' => 'enter url please',
    //     ];
    // }
}
