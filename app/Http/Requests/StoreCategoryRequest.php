<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
           'name'=>'required|min:3|max:255',
           'slug'=>'required|min:3|max:255|unique:categories',
           'status'=>'required',
           'order_by'=>'required|numeric',
        ];
    }
}
