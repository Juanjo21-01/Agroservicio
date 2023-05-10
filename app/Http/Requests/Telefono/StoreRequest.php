<?php

namespace App\Http\Requests\Telefono;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los telefonos de proveedores
    public function rules()
    {
        return [
            'proveedor_id' => ['integer', 'required', 'exists:proveedores,id'],
            'telefono' => ['required', 'string', 'min:8', 'max:25']
        ];
    }
}
