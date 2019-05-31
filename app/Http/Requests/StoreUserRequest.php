<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'num_socio' => 'required|max:11|integer|unique:',
            /*            
            'num_socio' => 'required|integer|max:11|unique:users',
            'nome_informal' => 'required|max:40|string',
            'name' => 'required|max:255|string',
            'sexo' => 'required|in:M,F', 
            'data_nascimento' => 'required|before:today',
            'email' => 'required|email|max:255|unique:users,email', 
            'foto_url' => 'required',
            'nif' => 'required|min:9|max:9',
            'telefone' => 'required|max:20',
            'tipo_socio' => 'required|in:P,NP,A',
            'quota_paga' => 'required|in:1,0',
            'ativo' => 'required|in:1,0',
            'direcao' => 'required|in:1,0'
            */
        ];
    }
}
