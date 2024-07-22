<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'email'  => 'required|email|string|max:200|unique:providers',
            'ruc_number' => 'required|string|max:60|min:11|unique:providers',
            'address' => 'nullable|string|max:2550',
            'phone' => 'required|string|max:11|min:9|unique:providers',
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
            'ruc_number.max' => 'El número debe de ser de 60 caracteres máximo',
            'ruc_number.min' => 'El número debe de ser de 11 caracteres mínimo',
            'ruc_number.unique' => 'Ese correo ya se encuentra registrado',

            'address.string' => 'El valor no es correcto',
            'address.max' => 'El número debe de ser de 255 caracteres',

            'phone.required' => 'El campo es requerido',
            'phone.string' => 'El valor no es correcto',
            'phone.max' => 'El número debe de ser de 10 caracteres',
            'phone.min' => 'El número debe de ser de 10 caracteres',
            'phone.unique' => 'Ese correo ya se encuentra registrado',
        ];
    }
}
