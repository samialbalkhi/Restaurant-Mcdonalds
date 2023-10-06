<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OurResponsibilityRequest extends FormRequest
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
         $commonRules = [
        'title' => ['required', 'min:10'],
        'description' => ['required', 'min:10'],
        'message' => ['nullable'],
        'section_id' => ['required'],
        'image' => ['required'],
    ];

    switch ($this->method()) {
        case 'PUT':
        case 'PATCH':
            // Add or override rules for 'PUT' and 'PATCH' methods if needed
            return $commonRules;
        default:
            return $commonRules;
    }
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ]),
        );
    }
}
