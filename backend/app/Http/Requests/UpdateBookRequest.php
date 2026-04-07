<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:2', 'max:150'],
            'author' => ['string', 'min:3', 'max:100'],
            'description' => ['string', 'min:10'],
            'year' => ['integer', 'min:1500', 'max:' . now()->year],
            'available_copies' => ['integer', 'min:1'],
        ];
    }
}
