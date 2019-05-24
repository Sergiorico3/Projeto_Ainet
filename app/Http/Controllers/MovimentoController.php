<?php

namespace App\Http\Controllers;

use App\User;
use App\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MovimentoController;

class MovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimentos=request()->query();
        
        $id=request()->query('id');
        $aeronave=request()->query('aeronave');
        $piloto_id=request()->query('piloto_id');
        $instrutor_id=request()->query('instrutor_id');
        $data=request()->query('data');
        $natureza=request()->query('natureza');
        $confirmado=request()->query('confirmado');

        $movimentos = Movimento::where('id','>','0');
        
        if ($id) {      
            $movimentos = $movimentos->where('id', $id);
        }
        if ($aeronave) {      
            $movimentos = $movimentos->where('aeronave', $aeronave);
        }
        if ($piloto_id) {      
            $movimentos = $movimentos->where('piloto_id', $piloto_id);
        }
        if ($instrutor_id) {      
            $movimentos = $movimentos->where('instrutor_id', $instrutor_id);
        }
        if ($data) {      
            $movimentos = $movimentos->where('data', $data);
        }
        if ($natureza) {      
            $movimentos = $movimentos->where('natureza', $natureza);
        }
        if ($confirmado) {      
            $movimentos = $movimentos->where('confirmado', $confirmado);
        }


        $movimentos=$movimentos->paginate(15);
        return view('movimentos.listAll', compact('movimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle = "Adicionar Movimento";
        $aerodromos = DB::table("aerodromos")->get();
        $aeronaves = DB::table("aeronaves")->get();
        $pilotos = User::where('tipo_socio','P')->get();
        $intrutores = User::where('instrutor','1')->get();
        return view('movimentos.create', compact('pagetitle', 'aerodromos','aeronaves', 'pilotos', 'intrutores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movimento = new Movimento;
        $movimento->fill($request->all());
        $movimento->confirmado = 0;
        $movimento->hora_descolagem = $movimento->data . ' ' . $movimento->hora_descolagem . ':00';
        $movimento->hora_aterragem = $movimento->data . ' ' . $movimento->hora_aterragem . ':00';
        $movimento->save();
        return redirect()->route("movimentos.index")->with('success', 'Movimento criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', User::class, $this);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
