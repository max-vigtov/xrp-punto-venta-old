<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(){
        return [
            'name' => 'required|string|max:255',

            'email'  => 'required|email|string|max:200|unique:providers,email,'.
            $this->route('provider')->id.'|max:255',

            'ruc_number' => 'required|string|max:50|min:11|unique:providers,ruc_number,'.
            $this->route('provider')->id.'|max:255',

            'address' => 'nullable|string|max:2550',

            'phone' => 'required|string|min:9|unique:providers,'.
            $this->route('provider')->id.'|max:11',

        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permiten 255 caracteres',

            'email.required' => 'El campo es requerido',
            'email.email' => 'No ha ingresado un correo con el formato válido',
            'email.string' => 'El valor no es correcto',
            'email.max' => 'Solo se permiten 255 caracteres',
            'email.unique' => 'Ese correo ya se encuentra registrado',

            'ruc_number.required' => 'El campo es requerido',
            'ruc_number.string' => 'El valor no es correcto',
            'ruc_number.max' => 'El número debe de ser de 60 caracteres',
            'ruc_number.min' => 'El número debe de ser de 60 caracteres',
            'ruc_number.unique' => 'Ese correo ya se encuentra registrado',

            'address.string' => 'El valor no es correcto',
            'address.max' => 'El número debe de ser de 255 caracteres',

            'phone.required' => 'El campo es requerido',
            'phone.string' => 'El valor no es correcto',
            'phone.max' => 'El número debe de ser de 11 caracteres',
            'phone.min' => 'El número debe de ser de 9 caracteres',
            'phone.unique' => 'Ese correo ya se encuentra registrado',
        ];
    }
}
