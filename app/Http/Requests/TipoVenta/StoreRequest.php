<?php

namespace App\Http\Requests\TipoVenta;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los tipo de ventas
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:20', 'unique:tipo_ventas,nombre'],
        ];
    }
}
