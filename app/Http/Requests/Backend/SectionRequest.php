<?php

namespace App\Http\Requests\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SectionRequest extends FormRequest
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
        $rules = [];

        $rules = [
            'name' => ['required', 'unique:userasd,name', 'max:30', 'min:3'],
            'description' => ['required', 'min:3'],
            'message' => ['required'],
            'status' => ['required'],
            'image' => ['required', 'image', 'max:2048'],
        ];
            
        if (Request::route()->getName() == 'sections.update') {
            $rules['name'] = ['required', 'max:30', 'min:3', Rule::unique('sections', 'name')->ignore($this->section->id)];
        }

        return $rules;
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
