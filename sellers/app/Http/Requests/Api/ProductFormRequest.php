<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'title' => ['required','min:8'],
            'description' => ['required','min:10'],
            'price' => ['required','min:3'],
            'sold' => ['required','boolean'],
            'category' => ['required','exists:categories,id'],
            'media' => ['required','image','max:2000'],
            'pictures' => ['required'],
        ];
    }
}
