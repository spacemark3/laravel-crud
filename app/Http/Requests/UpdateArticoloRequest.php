<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticoloRequest extends FormRequest
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
            'titolo' => 'required|string|max:255',
            'contenuto' => 'required|string',
            'categoria_id' => 'nullable|exists:categorie,id',
            'immagine' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
        public function messages(): array
    {
        return [
            'titolo.required' => 'il titolo è obbligatorio',
            'contenuto.required' => 'Il contenuto è obbligatorio',
            'imagine.image' => 'Il file deve essere un\'immagine valida',
        ];
    }
}
