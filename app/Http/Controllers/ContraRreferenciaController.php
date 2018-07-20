<?php

namespace App\Http\Controllers;

use App\ContraRreferencia;
use Illuminate\Http\Request;
use App\Referencia;

class ContraRreferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $test=Referencia::all();

      return $test;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contrarreferencia = ContraRreferencia::create([
          'referencia_id' => $request->referencia_id,
          'condutaAdotada' => $request->condutaAdotada,
          'diagnostico' => $request->diagnostico,
        ]);

        $referencia = Referencia::where('referencias.id','=',"$request->referencia_id")
        ->select('id','descricaoCaso','especialidade_id','instituicao_id','numSus_id','numConselho_id')
        ->get();
        foreach ($referencia as $Referencia){
          $descricaoCaso=$Referencia->descricaoCaso;
          $especialidade_id=$Referencia->especialidade_id;
          $instituicao_id=$Referencia->instituicao_id;
          $numSus_id=$Referencia->numSus_id;
          $numConselho_id=$Referencia->numConselho_id;
          $id=$Referencia->id;
        }

        Referencia::where('referencias.id','=',"$request->referencia_id")
        ->update([
          'id' => $id,
          'descricaoCaso' => $descricaoCaso,
          'especialidade_id' => $especialidade_id,
          'instituicao_id' => $instituicao_id,
          'numSus_id' => $numSus_id,
          'numConselho_id' => $numConselho_id,
          'status' => 1,
        ]);



        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContraRreferencia  $contraRreferencia
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $contrarreferencia = ContraRreferencia::where('contra_rreferencias.referencia_id','=',"$request->referencia_id")
        ->select('referencia_id','condutaAdotada','diagnostico','created_at')
        ->get();

        return response()->json($contrarreferencia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContraRreferencia  $contraRreferencia
     * @return \Illuminate\Http\Response
     */
    public function edit(ContraRreferencia $contraRreferencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContraRreferencia  $contraRreferencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContraRreferencia $contraRreferencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContraRreferencia  $contraRreferencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContraRreferencia $contraRreferencia)
    {
        //
    }
}
