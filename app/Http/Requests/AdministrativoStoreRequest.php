<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministrativoStoreRequest extends FormRequest
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
            'ci'=>'required|integer|unique:personal',
            'nombre'=>'required|string|min:5|max:40',
            'paterno'=>'nullable|string|min:2|max:40',
            'materno'=>'nullable|string|min:2|max:40',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'nullable|string',
            'telefono'=>'required',
            'area' => 'required|string',
            'email'=>'nullable|email',
            'password'=>'required|confirmed',
            'id_permiso' => 'required'
        ];
    }
}
