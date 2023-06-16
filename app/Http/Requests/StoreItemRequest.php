<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'name' => ['required', 'unique:items', 'max:200', 'min:3'],
            'description' => ['nullable'],
            'category' => ['required', 'max:100', 'min:3'],
            'type' => ['required', 'max:100', 'min:3'],
            'weight' => ['required', 'numeric'],
            'cost' => ['required', 'numeric']

        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Il campo Nome è obbligatorio",
            'name.unique' => "Il Nome inserito è già stato utilizzato.",
            'name.min' => "Il Nome inserito deve contenere almeno :min caratteri",
            'name.max' => "Il Nome inserito non può contenere più di :max caratteri",
            'category.required' => "Il campo Categoria è obbligatorio",
            'category.min' => "La Categoria inserita deve contenere almeno :min caratteri",
            'category.max' => "La Categoria inserita non può contenere più di :max caratteri",
            'type.required' => "Il campo Tipo è obbligatorio",
            'type.min' => "Il Tipo inserito deve contenere almeno :min caratteri",
            'type.max' => "Il Tipo inserito non può contenere più di :max caratteri",
            'weight.required' => "Il campo Peso è obbligatorio",
            'cost.required' => "Il campo Costo è obbligatorio"

        ];
    }
}
