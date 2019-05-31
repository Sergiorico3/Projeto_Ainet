<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovimentoRequest extends FormRequest
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
            'data' => 'required|date|date_format:Y-m-d',
            'hora_descolagem' => 'required|date_format:H:i',
            'hora_aterragem' => 'required|date_format:H:i',
            'aeronave' => 'required|min:0|max:9|exists:aeronaves,matricula',
            'num_diario' => 'required|integer|min:0|max:9',
            'num_servico' => 'required|integer|min:0|max:9',
            'piloto_id' => 'required|integer|min:0|max:9|exists:users,id',
            'natureza' => 'required|in:T,I,E',
            'classe_certificado_instrutor' => 'required|exists:classes_certificados,code',
            'classe_certificado_piloto' => 'required|exists:classes_certificados,code',
            'aerodromo_partida' => 'required|exists:aerodromos,code',
            'aerodromo_chegada' => 'required|exists:aerodromos,code',
            'instrutor_id' => 'required|exists:users,id',
            'tipo_licenca_instrutor' => 'required|exists:licencas,code',
            'tipo_licenca_piloto' => 'required|exists:licencas,code',
        ];
    }
}
