<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:products,name,'.
                $this->route('product')->id.'|max:255',
            'image' => 'required|dimensions:min_width:100,min_height:200',
            'sell_price' => 'required',
            'category_id' => 'integer|required|exists:App\Models\Category,id',
            'provider_id' => 'integer|required|exists:App\Models\Provider,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.unique' => 'El producto ya está registrado',
            'name.max' => 'Solo se permiten 255 caracteres',

            'image.required' => 'El campo es requerido',
            'image.dimensions' => 'Solo se permiten imagenes de 100x200 px',

            'sell_price.required' => 'El campo es requerido',

            'category_id.integer' => 'El valor debe ser un número entero',
            'category_id.required' => 'El campo es requerido',
            'category_id.exists' => 'La categoría no existe',

            'provider_id.integer' => 'El valor debe ser un número entero',
            'provider_id.required' => 'El campo es requerido',
            'provider_id.exists' => 'El proveedor no existe',
        ];
    }

}
