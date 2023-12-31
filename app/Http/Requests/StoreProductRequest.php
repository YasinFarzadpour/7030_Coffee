<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
      return Auth::user()->can('Create Products');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'description' => ['required'],
            'category_id' => ['required','exists:categories,id'],
            'is_published' => ['boolean'],
            'stock' => ['integer'],
        ];
    }
}
