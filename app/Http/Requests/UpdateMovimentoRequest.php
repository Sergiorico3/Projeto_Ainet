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
            'data' => 'nullable|date|date_format:Y-m-d',
            'hora_descolagem' => 'date_format:H:i',
            'hora_aterragem' => 'date_format:H:i',
            'aeronave' => 'min:0|max:9|exists:aeronaves,matricula',
            'num_diario' => 'integer|min:0|max:9',
            'num_servico' => 'integer|min:0|max:9',
            'piloto_id' => 'integer|min:0|max:9|exists:users,id',
            'natureza' => 'in:T,I,E',
            'classe_certificado_instrutor' => 'exists:classes_certificados,code',
            'classe_certificado_piloto' => 'exists:classes_certificados,code',
            'aerodromo_partida' => 'exists:aerodromos,code',
            'aerodromo_chegada' => 'exists:aerodromos,code',
            'instrutor_id' => 'exists:users,id',
            'tipo_licenca_instrutor' => 'exists:licencas,code',
            'tipo_licenca_piloto' => 'exists:licencas,code'
        ];
    }
}
