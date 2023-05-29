<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => [
                'required', 'max:50', Rule::unique('projects')->ignore($this->project)
            ],
            'description' => 'required|max:5000',
            'link' => 'required|max:255|url',
            'image' => 'required|max:1024|image',
            'project_date' => 'required|date',
            'type_id' =>
            'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'
        ];
    }
    public function messages()
    {
        return [

            'title.required' => 'Il titolo è richiesto.',
            'title.max' => 'Puoi inserire massimo 50 caratteri per il titolo.',
            'title.unique' => 'Il titolo è già stato creato.',
            'description.required' => 'La descrizione è richiesta.',
            'description.max' => 'Puoi inserire massimo 5000 caratteri per la descrizione.',
            'link.required' => 'URL è richiesto.',
            'link.max' => 'Puoi inserire massimo 255 caratteri per il campo URL.',
            'link.url' => 'Il dato inserito deve essere di tipo URL.',
            'image.required' => "L'immagine è richiesta.",
            'image.max' => "Puoi inserire massimo 1024 kilobyte per l'immagine.",
            'image.image' => "Il file selezionato deve essere di tipo immagine.",
            'project_date.required' => 'La data è richiesta.',
            'project_date.date' => 'Il dato inserito deve essere di tipo DATE.',
            'type_id.exists' => 'Il valore selezionato non è valido',
            'technologies.exist' => 'Il valore selezionato non è esiste'
        ];
    }
}
