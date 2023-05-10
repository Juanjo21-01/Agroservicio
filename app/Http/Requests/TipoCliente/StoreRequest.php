<?php

namespace App\Http\Requests\TipoCliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los tipo de clientes
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:30', 'unique:tipo_clientes,nombre']

        ];
    }
}
