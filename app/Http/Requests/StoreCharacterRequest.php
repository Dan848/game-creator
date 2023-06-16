<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCharacterRequest extends FormRequest
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
            'name' => ['required', 'unique:characters', 'max:200', 'min:2'],
            'description' => ['required'],
            'strength' => ['required', 'numeric', 'min:0', 'max:15'],
            'defence' => ['required', 'numeric', 'min:0', 'max:15'],
            'speed' => ['required', 'numeric', 'min:0', 'max:15'],
            'intelligence' => ['required', 'numeric', 'min:0', 'max:15'],
            'life' => ['required', 'numeric', 'min:70', 'max:120'],
            'type_id' => ['required']

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
            'strength.required' => "Il campo 'forza' è obbligatorio",
            'strength.numeric' => "Il campo 'forza' deve essere un numero",
            'strength.min' => "Il campo 'forza' deve essere almeno :min",
            'strength.max' => "Il campo 'forza' non può superare :max",
            'defence.required' => "Il campo 'difesa' è obbligatorio",
            'defence.numeric' => "Il campo 'difesa' deve essere un numero",
            'defence.min' => "Il campo 'difesa' deve essere almeno :min",
            'defence.max' => "Il campo 'difesa' non può superare :max",
            'speed.required' => "Il campo 'velocità' è obbligatorio",
            'speed.numeric' => "Il campo 'velocità' deve essere un numero",
            'speed.min' => "Il campo 'velocità' deve essere almeno :min",
            'speed.max' => "Il campo 'velocità' non può superare :max",
            'intelligence.required' => "Il campo 'intelligenza' è obbligatorio",
            'intelligence.numeric' => "Il campo 'intelligenza' deve essere un numero",
            'intelligence.min' => "Il campo 'intelligenza' deve essere almeno :min",
            'intelligence.max' => "Il campo 'intelligenza' non può superare :max",
            'life.required' => "Il campo 'vita' è obbligatorio",
            'life.numeric' => "Il campo 'vita' deve essere un numero",
            'life.min' => "Il campo 'vita' deve essere almeno :min",
            'life.max' => "Il campo 'vita' non può superare :max",
            'type_id' => "Il campo 'Classe' non può superare :max"
        ];
    }
}
