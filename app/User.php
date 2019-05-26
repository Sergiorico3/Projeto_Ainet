<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'num_socio', 'nome_informal', 'sexo', 'data_nascimento', 'email', 'nif', 'tipo_socio', 'quota_paga', 'ativo', 'direcao',
        ''
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function typeSocioToString(){
        switch ($this->tipo_socio) {
            case 'P':
                return 'Piloto';
            case 'NP':
                return 'Não-piloto';
            case 'A':
                return 'Aeromodelista';
        }
        return 'Unknown';
    }

    public function direcaoToString(){
        switch ($this->direcao) {
            case '0':
                return 'Não';
            case '1':
                return 'Sim';
        }
        return 'Unknown';
    }


}
