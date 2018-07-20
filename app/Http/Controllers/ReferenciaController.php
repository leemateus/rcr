<?php

namespace App\Http\Controllers;

use App\Referencia;
use Illuminate\Http\Request;
use App\Http\Resources\ReferenciaResource;
use App\Especialidade;
use App\Instituicao;

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

      $instituicao = Instituicao::join('profissionals','profissionals.instituicao_id','=','instituicaos.id')
      ->where('profissionals.numConselho','=',"$request->numConselho_id")
      ->select('profissionals.instituicao_id')
      ->get();
      foreach ($instituicao as $Instituicao){
        $instituicao=$Instituicao->instituicao_id;
      }


      $especialidade = Especialidade::join('profissionals','profissionals.especialidade_id','=','especialidades.id')
      ->where('profissionals.numConselho','=',"$request->numConselho_id")
      ->select('profissionals.especialidade_id')
      ->get();
      foreach ($especialidade as $Especialidade){
        $especialidade=$Especialidade->especialidade_id;
      }

      $referencias = Referencia::join('profissionals','profissionals.numConselho','=','referencias.numConselho_id')
      ->where('referencias.numConselho_id','!=',"$request->numConselho_id")
      ->where('referencias.especialidade_id','=',"$especialidade")
      ->where('referencias.instituicao_id','=',"$instituicao")
      ->where('referencias.status','=',0)
      ->select('referencias.id','descricaoCaso','referencias.created_at')
      ->get();

      return response()->json($referencias);




    }
    public function showC(Request $request){

      $referencias = Referencia::join('contra_rreferencias','id','=','contra_rreferencias.referencia_id')
      ->join('profissionals','profissionals.numConselho','=','referencias.numConselho_id')
      ->where('referencias.numConselho_id','=',"$request->numConselho_id")
      ->select('id','descricaoCaso','referencias.created_at')
      ->get();

      // $referencias = Referencia::join('profissionals','profissionals.numConselho','=','referencias.numConselho_id')
      // ->where('referencias.status','=','1')
      // ->get();

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
