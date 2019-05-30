<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            /*
            'num_socio' => 'required | unique:users, num_socio,'.$this->socio->id.'| max:8',
            'num_socio' => 'required | max:8',
            'nome_informal' => 'required | max:40 | string',
            'name' => 'required | max:255 | string',
            'sexo' => 'required | in:M,F', 
            'data_nascimento' => 'required | date',
            'email' => 'required | unique:users | email | max:255 | regex:^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$', 
            'foto_url' => 'required | image | max:255',
            'nif' => 'required | numeric | max:9',
            'telefone' => 'required | numeric | max:20',
            'tipo_socio' => 'required | in:P,NP,A',
            'quota_paga' => 'required | in:1,0',
            'ativo' => 'required | in:1,0',
            'direcao' => 'required | in:1,0'
            */
        ];
    }
}
