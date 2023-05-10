<?php

namespace App\Http\Requests\Venta;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para las ventas
    public function rules()
    {
        return [
            'tipo_venta_id' => ['integer', 'required', 'exists:tipo_ventas,id'],
            'cliente_id' => ['integer', 'required', 'exists:clientes,id'],
            'total' => ['required', 'numeric', 'min:0', 'max:1000000'],
            'descripcion' => ['string', 'min:5', 'max:100']
        ];
    }
}
