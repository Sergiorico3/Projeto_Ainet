<?php

namespace App\Http\Controllers;

use App\Aeronave;
use App\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAeronaveRequest;

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
    {
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
    public function update(Request $request, $id)
    {
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
        if( $aeronave->matricula = (Movimento::where('aeronave','=', $aeronave->matricula)) ){
            $aeronave->delete();
            return redirect()->route("aeronaves.index")->with('success', 'Aeronave apagada com sucesso');
        }
        else{           //TODO não passa para o else
            $matricula=$aeronave->matricula;
            DB::delete('delete from aeronaves_valores where matricula = ?', [$matricula]);
            $aeronave->forceDelete();
            return redirect()->route("aeronaves.index")->with('success', 'Aeronave apagada com sucesso');
        }

    }
}
