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
        if ($this->method('post')) {
            return [
                'location' => ['required'],
                'franchisee' => ['required'],
                'description' => ['required'],
                'image' => ['required'],
                'title' => ['nullable'],
                'job_id' => ['required'],
            ];
        } else {
            return [
                'location' => ['required'],
                'franchisee' => ['required'],
                'description' => ['required'],
                'image' => ['required'],
                'title' => ['nullable'],
                'job_id' => ['required'],
            ];
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
