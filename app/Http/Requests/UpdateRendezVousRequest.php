<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRendezVousRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title' => 'Veillez saisir le titre',
            'description.required' => 'La description est requise',
            'date.required' => 'La date est requise',
            'status.required' => 'Le statut est requis',
        ];
    }
}