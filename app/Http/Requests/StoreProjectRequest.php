<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:150',
            'cover_image' => 'nullable|image|max:300',
            'description' => 'nullable',
            'date' => 'nullable',
            'languages' => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Attenzione! Inserisci un nome per il tuo progetto.',
            'title.min' => 'Attenzione! Il titolo deve essere lungo almeno 5 caratteri.',
            'title.max' => 'Attenzione! Hai superato il numero massimo di caratteri (150)',
            'cover_image.max' => 'L\'immagine è troppo pesante, utilizzane una al di sotto dei 300KB',
            'languages.required' => 'Attenzione! Selezione una o più opzioni per i linguaggi di programmazione.'
        ];
    }
}
