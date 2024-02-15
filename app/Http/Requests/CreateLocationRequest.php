<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLocationRequest extends FormRequest
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
            'lieu_depart' => 'required|string|max:255',
            'lieu_retour' => 'required|string|max:255',
            'payement' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'date_retour' => 'required|date|after_or_equal:date_depart',
        ];
    }
}
