<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SellerFormRequest extends FormRequest
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
            'name' => ['required','min:8'],
            'legal' => ['required','min:8'],
            'address' => ['required','min:8'],
            'phone' => ['required','min:8'],
            'email' => ['required','email'],
            'picture' => ['image','max:2000'],
        ];
    }
}
