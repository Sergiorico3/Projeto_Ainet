<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'num_socio', 'nome_informal', 'sexo', 'data_nascimento', 'email', 'nif', 'tipo_socio', 'quota_paga', 'ativo', 'direcao'
        
        /*'email', 'password', 'num_socio', 'tipo_socio', 'nome_informal', 'sexo', 'foto_url', 'nif', 'telefone', 'endereco', 'quota_paga','ativo', 'direcao', 'data_nascimento',*/
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
}
