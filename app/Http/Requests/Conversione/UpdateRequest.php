<?php

namespace App\Http\Requests\Conversione;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los tipo de compras
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:25', 'unique:conversiones,nombre']
        ];
    }
}
