<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        switch ($this->method()) {
            case 'POST':
                return [
                    'location' => ['required', 'min:5'],
                    //'Franchisenehmer'
                    'franchisee' => ['required', 'min:5'],
                    'description' => ['required', 'min:5'],
                    'image' => ['required'],
                    'title' => ['nullable', 'min:3'],
                    'job_id' => ['required'],
                    'listOfDetails' => ['array', 'required'],
                    'listOfDetails.*.details' => ['required', 'min:3'],
                    'job_offer_id' => ['required'],
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'location' => ['required', 'min:5'],
                    'franchisee' => ['required', 'min:5'],
                    'description' => ['required', 'min:5'],
                    'image' => ['required'],
                    'title' => ['nullable', 'min:3'],
                    'job_id' => ['required'],
                    'details' => ['required', 'array'],
                    'job_offer_id' => ['required'],
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
