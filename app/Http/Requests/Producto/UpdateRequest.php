<?php

namespace App\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los productos
    public function rules()
    {
        return [
            'conversion_id' => ['integer', 'required', 'exists:conversiones,id'],
            'tipo_producto_id' => ['integer', 'required', 'exists:tipo_productos,id'],
            'proveedor_id' => ['integer', 'required', 'exists:proveedores,id'],
            'nombre' => ['required', 'string', 'min:5', 'max:50', 'unique:productos,nombre'],
            'descripcion' => ['required', 'string', 'min:5', 'max:100'],
            'precio_venta' => ['required', 'numeric', 'min:0', 'max:1000000'],
        ];
    }
}
