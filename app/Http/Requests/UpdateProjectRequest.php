<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// import l'helper


class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50|unique:projects,title',
            'description' => 'required',
            'customer' => 'required',
            'type_customer' => 'required|max:30',
            'price' => 'required|max:15',
            'created' => 'required|date',
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'Il campo Titolo è richiesto',
            'title.unique' => 'Il campo Titolo deve eseere univoco e quello che hai scelto è già presente',
            'title.max' => 'Il campo Titolo non deve superare i 50 caratteri',
            'description.required' => 'Il campo Descrizione è richiesto',
            'price.required' => 'Il campo Costo è richiesto',
            'customer.required' => 'Il campo Cliente è richiesto',
            'type_customer.required' => 'Il campo Settore è richiesto',
            'created.required' => 'Il campo Data è richiesto'
        ];
    }
}
