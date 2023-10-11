<?php

namespace App\Http\Requests\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $rotename = Request::route()->getName();

        $rules = [];
        $rules = [
            'name' => ['required', 'min:3', 'unique:my_cafes,name'],
            'description' => ['required', 'min:3'],
            'image' => ['required', 'image'],
            'section_id' => ['required'],
        ];

        if ($rotename) {
            $rules['name'] = ['required', 'max:30', 'min:3', Rule::unique('my_cafes', 'name')->ignore($this->route()->mycafe->id)];
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
