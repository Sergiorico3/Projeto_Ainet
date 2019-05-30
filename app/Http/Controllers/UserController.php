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
        //$this->authorize("create", User::class);
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
        
        $socio = User::findOrFail(Auth::user()->id);

        $socio->save();
        $extension=$request->file('foto_url')->getClientOriginalExtension();
        $name= $socio->id . '_photo.'.$extension;
        Storage::disk('public')->putFileAs('fotos', $request->file('foto_url'),$name);
        $socio->foto_url=$name;
        $socio->save();

        return redirect()->route("socios.index")->with('success', 'Sócio editado com sucesso!');
    }

    public function delete(User $socio){

        if($socio->id = Movimento::where('piloto_id','=', $socio->id)){
            //soft delete (altera só o campo: deleted_at)
             $socio->delete();
        }
        
        
        //Hard delete
        //$socio->forceDelete();
        return redirect()->route("socios.index")->with('success', 'Sócio apagado com sucesso');
    }

    public function edit(User $socio)
    {
        $pagetitle = "Show and edit socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('users.edit', compact('pagetitle', 'socio'));
    }
    
    public function mostrarCertificado(User $socio){
        return view('users.mostrarcertificado', compact('socio'));
    }

    public function mostrarLicenca(User $socio){
        return view('users.mostrarlicenca', compact('socio'));
    
    }

    //inverter quota_paga
    public function quota(User $socio){
        if($socio->quota_paga){
            $socio->quota_paga = 0;
        }else{
            $socio->quota_paga = 1;
        }
        $socio->save();
        return redirect()->route("socios.index")->with('success', 'Alteração feita com sucesso');
    }

    //Altera todas as quota_paga a 0
    public function reset_quotas(){
        User::where('quota_paga','=', '1')->update(['quota_paga'=>'0']);
        return redirect()->route("socios.index")->with('success', 'Alteração feita com sucesso');
    }

    //Desativar todos os socios que não têm as quotas pagas
    public function desativar(){
        $socios = User::where('quota_paga','=',0)->update(['ativo' => '0']);
        $socios->save();
        return redirect()->route("socios.index")->with('success', 'Alteração feita com sucesso');
    }

    //Inverter ativo 
    public function ativar(User $socio){
        if($socio->ativo){
            $socio->ativo = 0;
        }else{
            $socio->ativo = 1;
        }
        $socio->save();
        return redirect()->route("socios.index")->with('success', 'Alteração feita com sucesso');
    }
    
    

}


