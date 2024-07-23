<?php

namespace App\Http\Requests\Client;

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
            'name' => 'required|string|max:255',
            'dni' => 'required|string|unique:clients,dni,'.
                $this->route('client')->id.'|max:255|max:255',
            'ruc' => 'string|unique:clients,ruc,'.
                $this->route('client')->id.'|max:255|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|unique:clients,phone,'.
                $this->route('client')->id.'|max:255|max:10',
            'email' => 'required|string|unique:clients,email,'.
                $this->route('client')->id.'|max:255|max:255|email:rfc,dns',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permiten 255 caracteres',

            'dni.required' => 'El campo es requerido',
            'dni.string' => 'Máximo sobrepasado, 255 caracteres como máximo',
            'dni.unique' => 'Esa credencial ya esta asociada con otro cliente',
            'dni.max' => 'Solo se permiten 255 caracteres',

            'ruc.unique' => 'Es número fiscal ya esta asociada con otro cliente',
            'ruc.string' => 'El valor no es correcto',
            'ruc.max' => 'Solo se permiten 255 caracteres',

            'address.string' => 'El valor no es correcto',
            'address.max' => 'Solo se permiten 255 caracteres',

            'email.string' => 'El valor no es correcto',
            'email.unique' => 'Este correo esta asociado a otro cliente',
            'email.max' => 'Solo se permiten 255 caracteres',
            'email.email' => 'Correo electrónico con formato inválido',
        ];
    }
}
