<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $fillable = [
        'data', 'hora_descolagem', 'hora_aterragem', 'aeronave', 'num_diario' ,
        'num_servico','piloto_id', 'natureza', 'aerodromo_partida', 'aerodromo_chegada',
        'num_aterragens', 'num_descolagens', 'num_pessoas', 'conta_horas_inicio', 'conta_horas_fim',
        'tempo_voo','preco_voo','modo_pagamento', 'num_recibo', 'observacoes'  
    ];
    
    protected $hidden = [
        
    ];
}
