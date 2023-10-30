<?php

namespace App\Http\Requests\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class DriverRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'restaurant_branche_id' => ['required'],
            'phone' => ['required', 'numeric', 'unique:drivers,phone'],
            'email' => ['required', 'email', 'unique:drivers,email'],
            'address' => ['required'],
            'status' => ['required'],

        ];
        if (Request::route()->getName() == 'drivers.update') {
            $rules['phone'] = ['required', 'min:3', Rule::unique('drivers', 'phone')->ignore($this->driver->id)];
            $rules['email'] = ['required', 'min:3', Rule::unique('drivers', 'email')->ignore($this->driver->id)];
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
