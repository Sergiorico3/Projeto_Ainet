<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeronave extends Model
{
    protected $primaryKey = 'matricula';
    public $incrementing = false;    

    /* public function relacao(){
    
        $piloto = $aeronave->pilotos;
        $piloto_nav = User::WhereNotId( return $this->belongsToMany("App\user", $aeronaves->piloto, 'matricula', 'piloto_id'), )

        
    }*/

    protected $fillable = [
        'matricula', 'marca', 'modelo', 'num_lugares', 'conta_horas', 'preco_hora' 
    ];
    
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
