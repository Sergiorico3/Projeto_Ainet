<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pesquisa=request()->query();
        
        $num_socio=request()->query('num_socio');
        $nome_informal=request()->query('nome_informal');
        $email=request()->query('email');
        $tipo_socio=request()->query('tipo_socio');
        $direcao=request()->query('direcao');
        //podemos não criar as variaveis e passar diretamente "request()->query('num_socio')" para o if

        $pesquisa = User::where('id','>','0');
        
        if (isset($num_socio)) {      
            $pesquisa = $pesquisa->where('num_socio', $num_socio);
        }       
        if ($nome_informal) {
            $pesquisa = $pesquisa->where('nome_informal', 'like', '%'.$nome_informal.'%');
        }
        if ($email) {
            $pesquisa = $pesquisa->where('email', $email);
        }
        if ($tipo_socio) {
            $pesquisa = $pesquisa->where('tipo_socio', $tipo_socio);
        }
        if ($direcao) {
            $pesquisa = $pesquisa->where('direcao', $direcao);
        }

        $pesquisa=$pesquisa->paginate(15);
        return view('users.listAll', compact('pesquisa'));  
    }

    public function store(){

    }

    public function create(User $socio)
    {
        $pagetitle = "Add socio";
        return view('users.create', compact('pagetitle'));
    }
    
    public function show(User $socio)
    {
        $pagetitle = "Show socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('home', compact('pagetitle', 'socio'));
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

    public function destroy(){

    }

    public function edit(User $socio)
    {
        $pagetitle = "Show and edit socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('users.edit', compact('pagetitle', 'socio'));
    }
    
    /* Obsoleto
    public function getfile(User $id) {
        
        return $path = $socio->foto_url;
    }   
    */
    

    
    

}


