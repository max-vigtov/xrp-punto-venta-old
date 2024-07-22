<?php

namespace App\Http\Requests\Category;

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
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Solo se permiten 50 caractéres',

            'description.string' => 'El valor no es correcto',
            'description.max' => 'Solo se permiten 255 caracteres',
        ];
    }

}
