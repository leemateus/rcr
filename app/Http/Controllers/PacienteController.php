<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use App\Contato;
use App\Endereco;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
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
      $paciente = Paciente::create([
        'numSus' => $request->numSus,
        'nome' => $request->nome,
        'nomeMae' => $request->nomeMae,
      ]);

      $endereco = Endereco::create([
        'logradouro' => $request->logradouro,
        'bairro' => $request->bairro,
        'numero' => $request->numero,
        'cidade' => $request->cidade,
        'complemento' => $request->complemento,
        'numSus_id' => $request->numSus,
      ]);

      $contato = Contato::create([
        'celular' => $request->celular,
        'fixo' => $request->fixo,
        'numSus_id' => $request->numSus,
      ]);

      // if(!$pacienet || !$endereco || !$contato){
      //   return response()->json('erro');
      // }
      // else{
      //   return response()->json('ok');
      // }
      return response()->json('ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function shows($numSus)
    {
        $pacientes = Paciente::where('numSus','like',"$numSus%")
        ->get();
        return Response()->json($pacientes,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      Paciente::where('pacientes.numSus','=',"$request->numSus")
      ->update([
        'numSus' => $request->numSus,
        'nome' => $request->nome,
        'nomeMae' => $request->nomeMae,
      ]);

      Endereco::where('enderecos.numSus_id','=',"$request->numSus")
      ->update([
        'logradouro' => $request->logradouro,
        'bairro' => $request->bairro,
        'numero' => $request->numero,
        'cidade' => $request->cidade,
        'complemento' => $request->complemento,
        'numSus_id' => $request->numSus,
      ]);

      Contato::where('contatos.numSUs_id','=',"$request->numSus")
      ->update([
        'celular' => $request->celular,
        'fixo' => $request->fixo,
        'numSus_id' => $request->numSus,
      ]);

      return response()->json('ok');
    }

    public function show($numSus){
        $paciente = Paciente::where('pacientes.numSus','=',"$numSus")
        // ->where('contatos.numSUs_id','=',"$numSus")
        // ->where('enderecos.numSUs_id','=',"$numSus")
        // ->join('contatos','pacientes.numSus','=','contatos.numSUs_id')
        // ->join('enderecos','pacientes.numSus','=','enderecos.numSUs_id')
        ->select('pacientes.numSus','pacientes.nome','pacientes.nomeMae')
        ->get();

        $endereco = Endereco::where('enderecos.numSus_id','=',"$numSus")
        ->select('enderecos.logradouro','enderecos.bairro','enderecos.numero','enderecos.cidade','enderecos.complemento')
        ->get();

        $contato = Contato::where('contatos.numSus_id','=',"$numSus")
        ->select('contatos.fixo','contatos.celular')
        // 'enderecos.logradouro','enderecos.bairro','enderecos.numero','enderecos.cidade','enderecos.complemento',
        // 'contatos.fixo','contatos.celular')
        ->get();

        // $dados = [$paciente,$endereco,$contato];

        return response()->json($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
