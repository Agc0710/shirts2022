<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ];
    }
    public  function  messages(){
        return [
            'name.required' => 'El campo nombre esta vacio',
            'email.required' => 'El campo email esta vacio',
            'password.required' => 'escriba la contraseña'
        ];
    }
}
