<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RestaurantOwnerRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:restaurant_owners,email'],
            'password' => ['required', 'min:8', 'max:30'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10 ', 'unique:restaurant_owners,phone'],
            'address' => ['required'],
            'note' => ['nullable'],
            'restaurant_branche_id' => ['required'],
        ];
        if (Request::route()->getName() == 'restaurantOwner.update') {
            $rules['phone'] = ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10 ', Rule::unique('restaurant_owners', 'phone')->ignore($this->restaurantOwner->id)];
            $rules['email'] = ['required', 'email', Rule::unique('restaurant_owners', 'email')->ignore($this->restaurantOwner->id)];
            $rules['restaurant_branche_id'] = ['required', Rule::unique('restaurant_owners', 'restaurant_branche_id')->ignore($this->restaurantOwner->id)];
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
