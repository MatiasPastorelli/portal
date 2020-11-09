<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRegistrarUsuarioRequest extends FormRequest
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
        return [ // agregando array (idem creado previamente como ejemplo en $validationdata)
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
