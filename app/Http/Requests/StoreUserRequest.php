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
            'name' => 'required|string|max:255|regex:/^[a-zA-Z]+$/u',
            'num_socio' => 'required|max:11|integer|unique',
            'nome_informal' => 'required|string|max:40|regex:/^[\w-]*$/',
            'nif' => 'min:9|max:9|nullable',
            'telefone' => 'nullable|digits_between:1,20',
            'email' => 'required|regex:/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/|unique:users,email'

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
