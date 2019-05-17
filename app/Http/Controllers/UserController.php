<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Storage;

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
        
        if ($num_socio) {      
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

    public function store(StoreUserRequest $request){
        $socio = new User;
        $socio->fill($request->all());
        $socio->password=Hash::make($socio->data_nascimento);
        
        //Guardar a imagem na BD
        $socio->save();
        $extension=$request->file('foto_url')->getClientOriginalExtension();
        $name= $socio->id . '_photo.'.$extension;
        $path = Storage::disk('public')->putFileAs('fotos', $request->file('foto_url'),$name);
        $socio->foto_url=$name;
        $socio->save();
        return redirect()->route("socios.index")->with('success', 'Sócio criado com sucesso!');
    }

    public function create()
    {
        return view('users.create');
    }
    
    public function show(User $socio)
    {
        $pagetitle = "Show socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('home', compact('pagetitle', 'socio'));
    }

    public function update(Request $request, User $socio)
    {
        $name = $request->foto_url;
        
        
        $socio->fill($request->all());
        $socio->save();
        $extension=$request->file('foto_url')->getClientOriginalExtension();
        $name= $socio->id . '_photo.'.$extension;
        Storage::disk('public')->putFileAs('fotos', $request->file('foto_url'),$name);
        $socio->foto_url=$name;
        $socio->save();


        $socio = User::findOrFail(Auth::user()->id);
        $socio->fill($request->all());

        $socio->foto_url = $name;

        
        $socio->save();

        return redirect()->action('HomeController@index', Auth::user()->id)->with(['msgglobal' => 'User Edited!']);
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


