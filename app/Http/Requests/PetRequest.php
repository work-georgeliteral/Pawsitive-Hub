<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'breed_id' => 'required|integer|exists:breeds,id',
            'name' => 'required|string|min:2',
            'age' => 'required|integer|min:0',
            'color' => 'required|string',
            'size' => 'required',
            'gender' => 'required|in:Male,Female',
            'description' => 'required',
            'activity_level' => 'required|in:High,Moderate,Low',
            'type' => 'required|in:Dog,Cat',
        ];
    }
}
