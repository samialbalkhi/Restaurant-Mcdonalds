<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
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
        $id = Route::current()->parameter('id');
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => ['required', 'unique:categories,name', 'max:30', 'min:3'],
                    'message' => ['nullable'],
                    'image' => ['required', 'image', 'max:2048'],
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => ['required', 'max:30', 'min:3', Rule::unique('categories', 'name')->ignore($id)],
                    'message' => ['nullable'],
                    'image' => ['required', 'max:2048'],
                ];
            default:
                break;
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
