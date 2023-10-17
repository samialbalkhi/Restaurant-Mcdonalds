<?php

namespace App\Http\Requests\Backend;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class JobOfferRequest extends FormRequest
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
        $rules = [
            'location' => ['required', 'min:5'],
            //'Franchisenehmer'
            'franchisee' => ['required', 'min:5'],
            'description' => ['required', 'min:5'],
            'image' => ['required', 'image'],
            'title' => ['nullable', 'min:3'],
            'employment_opportunity_id' => ['required'],
            'listOfDetails' => ['array', 'required'],
            'listOfDetails.*.details' => ['required', 'min:3'],
        ];
        if (Request::route()->getName()) {
            unset($rules['listOfDetails']);
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
