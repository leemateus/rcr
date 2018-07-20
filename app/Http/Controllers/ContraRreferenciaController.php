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

        return response()->json($contrarreferencia);
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
