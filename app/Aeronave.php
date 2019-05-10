<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeronave extends Model
{
    protected $fillable = [
        'matricula', 'marca', 'modelo', 'num_lugares', 'conta_horas', 'preco_horas' 
    ];
    
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
