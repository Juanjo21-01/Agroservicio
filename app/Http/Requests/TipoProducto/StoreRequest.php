<?php

namespace App\Http\Requests\TipoProducto;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    // Autorizar el almacenamiento de registros
    public function authorize()
    {
        return true;
    }

    // Validacion para los tipo de productos
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:5', 'max:50', 'unique:tipo_productos,nombre'],
            'descripcion' => ['string', 'min:5', 'max:100']
        ];
    }

    // Mensajes
    /* public function messages()
    {
        return [

        ];
    }*/
}
