<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'pet_id' => 'required|integer|exists:pets,id',
            'reason' => 'required|string|min:0|max:500',
            'whom' => 'required|string|min:2|max:20',
            'children_present' => 'required|string|in:Yes,No',
            'other_pets' => 'required|string|in:Yes,No',
            'family_favor' => 'required|string|in:Yes,No',
            'family_allergy' => 'required|string|in:Yes,No',
            'financer' => 'required|string|min:2|max:20',
            'carer' => 'required|string|min:2|max:20',
            'building_type' => 'required|string|min:2|max:20',
            'residence_policies' => 'required|string|min:0|max:500',
            'pet_place' => 'required|string|min:2|max:20',
            'litterbox_place' => 'required|string|min:2|max:20',
            'prepared_odour' => 'required|string|in:Yes,No',
            'selfie' => 'nullable|string',
        ];
    }
}
