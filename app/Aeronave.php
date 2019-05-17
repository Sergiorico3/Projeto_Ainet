<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeronave extends Model
{
    protected $primaryKey = 'matricula';
    public $incrementing = false;    

    protected $fillable = [
        'matricula', 'marca', 'modelo', 'num_lugares', 'conta_horas', 'preco_hora' 
    ];
    
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
