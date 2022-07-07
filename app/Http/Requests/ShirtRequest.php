<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShirtRequest extends FormRequest
{
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
            'shirt_name'=> 'required|max:255',
            'shirt_value' => ['required','integer'],
            'shirt_color' => 'required',
            'shirt_image' => ['image']
        ];
    }
    public  function  messages(){
        return [
            'shirt_name.required' => 'El campo nombre de la camiseta esta vacio',
            'shirt_value.required' => 'El campo valor de la camiseta  esta vacio',
            'shirt_color.required' => 'Escriba el color de la camiseta',
            'shirt_image.required' =>' Adjunte la imagen'

        ];
    }
}
