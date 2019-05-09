<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user=User::paginate(5);

        return view('home', compact('socio'));
    }
    
    public function show(User $socio)
    {
        $pagetitle = "Show socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('home', compact('pagetitle', 'socio'));
    }

    public function create(User $socio)
    {
        $pagetitle = "Add socio";
        return view('users.create', compact('pagetitle'));
    }

    public function getfile(User $id) {
        
        return $path= $socio->foto_url;
    }   

    public function edit(User $socio)
    {
        $pagetitle = "Show and edit socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('users.edit', compact('pagetitle', 'socio'));
    }

    public function update(Request $request, $id)
    {
        if ($request->has('cancel')) 
        {
            return redirect()->action('UserController@index');
        }

        $user = $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'age' => 'required|integer|between:1,120',
        ], [ // Custom Messages
            'name.regex' => 'Name must only contain letters and spaces.',
        ]);

        $userModel = User::findOrFail($id);
        $userModel->fill($user);
        $userModel->save();
        return redirect()->action('UserController@index');
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


