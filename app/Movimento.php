<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $fillable = [
        'data', 'hora_descolagem', 'hora_aterragem', 'aeronave', 'num_diario' ,
        'num_servico','piloto_id', 'natureza', 'aerodromo_partida', 'aerodromo_chegada',
        'num_aterragens', 'num_descolagens', 'num_pessoas', 'conta_horas_inicio', 'conta_horas_fim',
        'tempo_voo','preco_voo','modo_pagamento', 'num_recibo', 'observacoes', 'num_licenca_piloto'
    ];
    
    protected $hidden = [
        
    ];

    public function confirmadoToString(){
        switch ($this->confirmado) {
            case '0':
                return 'Não';
            case '1':
                return 'Sim';
        }
        return 'Unknown';
    }

    public function tipo_instrucaoToString(){
        switch ($this->tipo_instrucao) {
            case 'D':
                return 'Duplo comando';
            case 'S':
                return 'Solo';
            default:
                return 'Não aplicavel';
        }
        return '';
    }

    public function naturezaVooToString(){
        switch ($this->natureza) {
            case 'T':
                return 'Treino';
            case 'I':
                return 'Instrução';
            case 'E':
                return 'Especial';
            default:
                return 'Não aplicavel';
        }
        return 'Unknown';
    }

}
