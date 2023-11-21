<?php

namespace App\Http\Requests\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RestaurantBrancheRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'unique:restaurant_branches,name'],
            'city_id' => ['required'],
            'deliveryprice' => ['required','numeric'],
            'arrivaltime' => ['required','numeric'],
            'image' => ['required'],
            'status' => ['nullable'],
        ];
        if (Request::route()->getName() == 'restaurantBranche.update') {
            $rules['name'] = ['required', 'min:3', Rule::unique('restaurant_branches', 'name')->ignore($this->restaurantBranche->id)];
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
