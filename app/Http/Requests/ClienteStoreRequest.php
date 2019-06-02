<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteStoreRequest extends FormRequest
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
            'ci'=>'nullable|integer|unique:cliente',
            'nombre'=>'required|string|min:5|max:40',
            'telefono'=>'required|integer',
            'correo_electronico'=>'nullable|email',
            'nit'=>'nullable|integer|unique:cliente'
        ];
    }
}
