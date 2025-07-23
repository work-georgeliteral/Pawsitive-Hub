<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreedRequest extends FormRequest
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
            'name' => 'required|string|unique:breeds,name|min:2|max:20',
            'type' => 'required|string',
        ];
    }
}
