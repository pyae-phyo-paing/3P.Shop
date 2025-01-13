<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'code_no' => 'required',
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'instock' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ];
    }
}
