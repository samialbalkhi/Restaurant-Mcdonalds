<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProfileCustomerRequest extends FormRequest
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
        $customer = auth()->user();

        return [
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($customer->id)],
            'old_password' => ['sometimes', 'required', 'min:8'],
            'new_password' => ['sometimes', 'required', 'min:8', 'different:old_password'],
        ];
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
