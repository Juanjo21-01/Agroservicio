<?php

namespace App\Http\Requests\Proveedore;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los proveedores
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:50', 'unique:proveedores,nombre'],
            'nit' => ['required', 'string', 'min:8', 'max:15'],
            'direccion' => ['string', 'min:5', 'max:80']
        ];
    }
}
