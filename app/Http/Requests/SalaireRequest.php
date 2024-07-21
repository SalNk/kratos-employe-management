<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaireRequest extends FormRequest
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
            'employe_id' => 'required|integer',
            'montant' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'employe_id' => 'Veillez choisir l\'employe',
            'montant.required' => 'Le montant est requis',
            'montant.min' => 'Le montant est très court',
        ];
    }
}