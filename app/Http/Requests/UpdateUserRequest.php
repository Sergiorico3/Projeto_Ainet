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
            'direcao' => 'required | in:1,0',
            */
            'name' => 'required|string|nullable|max:255|regex:/^[a-zA-ZÀ-ú\s]+$/',
            'email' => 'regex:/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/|unique:users,email,' . $this->socio->id,
            'nome_informal' => 'required|string|nullable|min:1|max:40|regex:/^[0-9a-zA-ZÀ-ú\s]+$/',
            'sexo' => 'in:M,F',
            'foto_url' => 'nullable|file|mimes:jpeg,png,jpg|max:3000',
            'data_nascimento' => 'date',
            'nif' => 'digits_between:1,20|nullable|min:9|max:9',
            'telefone' => 'nullable|digits_between:1,20',
            'endereco' => 'nullable|string',
            'tipo_socio	' => 'in:P,NP,A',
            'quota_paga' => 'in:1,0',
            'ativo' => 'in:1,0',
            'direcao' => 'in:1,0',
            'instrutor' => 'in:1,0',
            'aluno' => 'in:1,0',
            'licenca_confirmada' => 'nullable|in:1,0',
            'certificado_confirmado' => 'nullable|in:1,0',
            'num_socio' => 'max:11|integer',
        ];
    }
}
