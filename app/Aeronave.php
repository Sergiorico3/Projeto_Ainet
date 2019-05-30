<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aeronave extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'matricula';
    public $incrementing = false;    

    public function valores(){
        return $this->hasMany("App\Aeronaves_valor", "matricula", "matricula"). $unidades = $valor->unidade_conta_horas;        
    }

    protected $fillable = [
        'matricula', 'marca', 'modelo', 'num_lugares', 'conta_horas', 'preco_hora' 
    ];
    
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];
}
