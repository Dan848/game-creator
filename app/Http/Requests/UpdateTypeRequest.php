<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('types')->ignore($this->type), 'max:150', 'min:2'],
            'description' => ['nullable'],
            'image' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Il campo 'nome' è obbligatorio",
            'name.unique' => "Il Nome inserito è già stato utilizzato.",
            'name.min' => "Il campo 'nome' deve contenere almeno :min caratteri",
            'name.max' => "Il campo 'nome' deve contenere al massimo :max caratteri",
            'description.required' => "Il campo 'descrizione' è obbligatorio",
            'image.required' => "Il campo 'immagine' è obbligatorio"
        ];
    }
}
