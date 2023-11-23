<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProfileRestaurantOwnerRequest extends FormRequest
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
        return [
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', Rule::unique('restaurant_owners')->ignore(auth('restaurantOwner-api')->user())],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10 ', Rule::unique('restaurant_owners')->ignore(auth('restaurantOwner-api')->user())],
            'address' => ['required'],
            'note' => ['nullable'],
            'old_password' => ['sometimes', 'required', 'min:8', 'max:30'],
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
