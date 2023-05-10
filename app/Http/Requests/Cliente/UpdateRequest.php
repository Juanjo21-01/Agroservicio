<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los clientes
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:50', 'unique:clientes,nombre'],
            'telefono' => ['required', 'string', 'min:8', 'max:25'],
            'direccion' => ['string', 'min:5', 'max:80'],
            'tipo_cliente_id' => ['integer', 'required', 'exists:tipo_clientes,id'],
        ];
    }
}
