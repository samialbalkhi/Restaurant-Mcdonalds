<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MycafeRequest extends FormRequest
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
        if ($this->method('post')) {
            return [
                'title_mycafe_drinks' => ['required'],
                'description_drinks_cold' => ['required'],
                'cold_drinks' => ['required'],
                'title_mycafe_sweets' => ['required'],
                'description_sweets' => ['required'],
                'image_drinks' => ['required'],
                'image_sweets' => ['required', 'max:2048'],
                'section_id' => ['required'],
            ];
        } else {
            return [
                'title_mycafe_drinks' => ['required'],
                'description_drinks_cold' => ['required'],
                'cold_drinks' => ['required'],
                'title_mycafe_sweets' => ['required'],
                'description_sweets' => ['required'],
                'image_drinks' => ['required'],
                'image_sweets' => ['required', 'max:2048'],
                'section_id' => ['required'],
            ];
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
