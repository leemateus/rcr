<?php

namespace App\Http\Controllers;

use App\Referencia;
use Illuminate\Http\Request;
use App\Http\Resources\ReferenciaResource;

class ReferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $referencias = Referencia::paginate();
      return ReferenciaResource::collection($referencias);
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
        Referencia::create([
          'descricaoCaso' => $request->descricaoCaso,
          'especialidade_id' => $request->especialidade_id,
          'instituicao_id' => $request->instituicao_id,
          'numSus_id' => $request->numSus_id,
          'numConselho_id' => $request->numConselho_id,
        ]);

        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function show(Referencia $referencia)
    {
      return new ReferenciaResource($referencia);
    }


    public function showS(Request $request)
    {
      // $referencias = Referencia::with('paciente','instituicao','especialidade','contraRreferencia')
      // ->whereNotIn('id','referncia_id')->select(
      //   'id',
      //   'descricaoCaso',
      //   'create_at',
      //   'numSus_id',
      //   'instituicao_id',
      //   'especialidade_id'
      //
      // )->get();
      $referencias = Referencia::join('contra_rreferencias','referencias.id','=','contra_rreferencias.referencia_id')
      ->join('profissionals','profissionals.numConselho','=','referencias.numConselho_id')
      ->where(['referencias.numConselho_id','!=',"$request->numConselho_id"],
                ['profissionals.especialidade_id','=','referencias.especialidade_id'],
                ['profissionals.instituicao_id','=','referencias.instituicao_id'])
      ->wehereNotIn('referencias.id',[contra_rreferencias.referencia_id])
      ->select('referencias.id','descricaoCaso','referencias.created_at')
      ->get();

      return response()->json($referencias);




    }
    //seleciona referencia sem contrarreferencia
    public function showC(Request $request){

      $referencias = Referencia::join('contra_rreferencias','id','=','contra_rreferencias.referencia_id')
      ->join('profissionals','profissionals.numConselho','=','referencias.numConselho_id')
      ->where('referencias.numConselho_id','=',"$request->numConselho_id")
      ->select('id','descricaoCaso','referencias.created_at')
      ->get();

      return response()->json($referencias);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referencia $referencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referencia $referencia)
    {
        //
    }
}
