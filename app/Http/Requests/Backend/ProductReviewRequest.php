<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
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
            'user_id' => ['required', 'min:10'],
            'product_id' => ['required', 'min:10'],
            'name' => ['nullable'],
            'rating' => ['required'],
            'comment' => ['required'],
            'review_type' => ['required'],
            'title' => ['required'],
        ];
    }
}
