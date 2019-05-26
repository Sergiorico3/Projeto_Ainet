<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAeronaveRequest extends FormRequest
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
            'matricula'=> 'required|max:8',
            'marca'=> 'required|max:40',
            'modelo'=> 'required|max:40',
            'num_lugares'=> 'required|max:11',
            'conta_horas'=> 'required|max:11',
            'preco_hora' => 'required|numeric|max:13,2',
            'tempos' => 'required|array|min:10|max:10',
            'tempos.x' => 'required|integer|min:1'
        ];
    }
    
}
