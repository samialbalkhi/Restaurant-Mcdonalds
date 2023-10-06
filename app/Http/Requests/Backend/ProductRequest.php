<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:50'],
            'description' => ['nullable', 'min:3'],
            'size' => ['required', 'min:2'],
            'price' => ['required', 'numeric'],
            'kcal' => ['required', 'numeric'],
            'category_id' => ['required'],
            'image' => ['required', 'max:2048'],
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
