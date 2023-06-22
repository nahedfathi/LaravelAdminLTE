<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                'name' => 'required',
                'email' => 'required|email',
                'logo' => 'required|dimensions:min_width=100,min_height=100',
                'website' => 'required|url',
            ];

    }
    public function messages()
    {
        return [
            'email.email' => 'The field should be real email.',
            'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
            'website.url' => 'enter url please',
        ];
    }
}
