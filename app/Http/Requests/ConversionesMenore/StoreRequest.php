<?php

namespace App\Http\Requests\ConversionesMenore;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'conversion_id' => ['integer', 'required', 'exists:conversiones,id'],
            'nombre' => ['required', 'string', 'min:5', 'max:25', 'unique:conversiones_menores,nombre']
        ];
    }
}
