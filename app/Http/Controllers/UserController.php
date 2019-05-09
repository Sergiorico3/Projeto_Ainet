<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user=User::paginate(5);

        return view('home', compact('user'));
    }
    
    public function show(User $user)
    {
        $pagetitle = "Show user";
        /*
        $user = User::findOrFail($user);
        */
        return view('home', compact('pagetitle', 'user'));
    }

    public function create(User $socio)
    {
        
    }

    public function getfile(User $id) {
        
        return $path= $user->foto_url;
    }   

    public function listAll(User $socios) {
        if ($socios->num_socio) {
            $termoPesquisa = $termoPesquisa->where('num_socio', $socios->num_socio);
        }

        if ($socios->nome_informal) {
            $termoPesquisa = $termoPesquisa->where('nome_informal', $socios->nome_informal);
        }

        if ($socios->email) {
            $termoPesquisa = $termoPesquisa->where('email', $socios->email);
        }

        if ($socios->tipo_socio) {
            $termoPesquisa = $termoPesquisa->where('tipo_socio', $socios->tipo_socio);
        }

        if ($socios->direcao) {
            $termoPesquisa = $termoPesquisa->where('direcao', $socios->direcao);
        }





        $users=User::where('ativo','=','1')->paginate(10);
        return view('users.listAll', compact('users'));
    }

}


