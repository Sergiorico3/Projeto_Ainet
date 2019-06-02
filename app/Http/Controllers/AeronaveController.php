<?php

namespace App\Http\Controllers;

use App\User;
use App\Aeronave;
use App\Movimento;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAeronaveRequest;
use App\Http\Requests\UpdateAeronaveRequest;
use Symfony\Component\HttpFoundation\Request;

class AeronaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aeronaves = Aeronave::all();

        return view('aeronaves.listAll', compact('aeronaves'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle = "Adicionar aeronave";
        return view('aeronaves.create', compact('pagetitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAeronaveRequest $request)
    {   //$request->validated();
        $aeronave = new Aeronave;
        $aeronave->fill($request->all());
        $aeronave->save();
        return redirect()->route("aeronaves.index")->with('success', 'Aeronave criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aeronave $aeronave)
    {
        //$this->authorize('edit', User::class);
        $pagetitle = "Show and edit aeronave";
        return view('aeronaves.edit', compact('pagetitle', 'aeronave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAeronaveRequest $request, $id)
    {

        //$this->authorize('update', User::class);
        $aeronave = Aeronave::findOrFail($id);
        $aeronave->fill($request->all());

        $aeronave->save();

        return redirect()->route("aeronaves.index")->with('success', 'Aeronave editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aeronave $aeronave)
    {
        if (Movimento::where('aeronave', '=', $aeronave->matricula)->count()) {
            $aeronave->delete();
            return redirect()->route("aeronaves.index")->with('success', 'Aeronave apagada com sucesso');
        } else {           //TODO não passa para o else
            DB::table('aeronaves_valores')->where('matricula', $aeronave->matricula)->delete();
            $aeronave->forceDelete();
            return redirect()->route("aeronaves.index")->with('success', 'Aeronave apagada com sucesso');
        }
    }

    public function listaPilotos(Aeronave $aeronave)
    {
        //$this->authorize('edit', User::class);
        $matricula = $aeronave->matricula;
        $aeronaves_pilotos = DB::table("aeronaves_pilotos")->get()->where('matricula', $matricula);

        $piloto_ids = DB::table("aeronaves_pilotos")->get('piloto_id');


        foreach ($piloto_ids as $piloto_id) {
            $unique = (DB::table("aeronaves_pilotos")->get()->where('matricula', '<>', $matricula)->where('piloto_id', '!=', $piloto_id));
            $aeronaves_nao_autorizados = $unique->unique('piloto_id');
            $aeronaves_nao_autorizados->values()->all();
        }

        $pagetitle = "Lista de pilotos autorizados a voar uma aeronave";
        return view('aeronaves.listaPilotos', compact('pagetitle', 'aeronaves_pilotos', 'aeronaves_nao_autorizados'));
    }

    public function remover(Aeronave $aeronave, User $piloto)
    {
        $matricula = $aeronave->matricula;
        $piloto_id = $piloto->id;

        if ($piloto_id) {
            $piloto = DB::table("aeronaves_pilotos")->where('matricula', $matricula)->where('piloto_id', $piloto_id)->delete();
        }

        return redirect()->route("aeronaves.index")->with('success', 'Piloto removido com sucesso');
    }

    public function acrescentar(Aeronave $aeronave, User $piloto)
    {
        $matricula = $aeronave->matricula;
        $piloto_id = $piloto->id;
        DB::table('aeronaves_pilotos')->insert(['matricula' => $matricula, 'piloto_id' => $piloto_id]);

        return redirect()->route("aeronaves.index")->with('success', 'Piloto autorizado com sucesso');
    }
}
