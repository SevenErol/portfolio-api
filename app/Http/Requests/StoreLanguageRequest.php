<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
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
            'lang_name' => 'required|min:5|max:150',
            'lang_image' => 'nullable|image|max:300',
            'description' => 'nullable',
            'scope' => 'nullable',
            'knowledge_level' => 'nullable|min:5|max:70'
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
            'lang_name.required' => 'Attenzione! Inserisci un nome per il tuo progetto.',
            'lang_name.min' => 'Attenzione! Il titolo deve essere lungo almeno 5 caratteri.',
            'lang_name.max' => 'Attenzione! Hai superato il numero massimo di caratteri (150)',
            'lang_image.max' => 'L\'immagine è troppo pesante, utilizzane una al di sotto dei 300KB'
        ];
    }
}
