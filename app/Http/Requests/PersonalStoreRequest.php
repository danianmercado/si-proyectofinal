<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|string|unique:cliente',
            'paterno'=>'required|string',
            'materno'=>'nullable|string',
            'direccion'=>'nullable|string',
            'telefono'=>'nullable|integer|unique:personal',
            'fecha_nacimiento'=>'required|date'
        ];
    }
}
