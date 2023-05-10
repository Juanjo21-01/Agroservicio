<?php

namespace App\Http\Requests\Compra;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para las compras
    public function rules()
    {
        return [
            'tipo_compra_id' => ['integer', 'required', 'exists:tipo_compras,id'],
            'proveedor_id' => ['integer', 'required', 'exists:proveedores,id'],
            'total' => ['required', 'numeric', 'min:0', 'max:1000000'],
            'descripcion' => ['string', 'min:5', 'max:100']
        ];
    }
}
