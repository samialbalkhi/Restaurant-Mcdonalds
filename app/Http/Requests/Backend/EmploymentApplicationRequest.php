<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmploymentApplicationRequest extends FormRequest
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
            'gender' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'city' => ['required'],
            'birthday' => ['required', 'date'],
            'phone' => ['required', 'numeric', 'unique:employment_applications,phone'],
            'email' => ['required', 'email', 'unique:employment_applications,email'],
            'title' => ['required', 'min:5'],
            'company_name' => ['nullable'],
            'office_location' => ['nullable'],
            'description' => ['nullable'],
            'start_date' => ['nullable'],
            'expire_date' => ['nullable'],
            'resume' => ['required', 'mimes:pdf', 'max:1000'],
            'message' => ['nullable'],
            'i_currently_work_here'=>['nullable'],
        ];
        return $rules ;
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
