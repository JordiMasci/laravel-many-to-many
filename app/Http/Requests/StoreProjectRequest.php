<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'string', ''],
            'content' => ['required', 'string', ''],
            'technology' => ['nullable', 'exists:technologies,id', ''],

            'type_id' => ['nullable', 'exists:types,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'content.required' => 'Il contenuto è obbligatorio',
            'type_id.required' => 'La tipologia è obbligatoria',
            'technology.required' => 'La selezione della tecnologia è obbligatoria',
        ];
    }
}
