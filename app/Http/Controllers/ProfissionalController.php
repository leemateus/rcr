<?php

namespace App\Http\Controllers;

use App\Profissional;
use Illuminate\Http\Request;
use App\User;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//inserir no banco
    {
      // DB::beginTransaction();
        $profissional = Profissional::create([
          'numConselho' => $request->numConselho,
          'nome' => $request->nome,
          'especialidade_id' => $request->especialidade_id,
          'instituicao_id' => $request->instituicao_id,
        ]);

        $user = User::create([
          'email' => $request->email,
          'password' => $request->password,
          'numConselho_id' => $request->numConselho,
        ]);

        if(!$profissional || !$user){
          // DB::rollbackTransaction();
        }
        else{
          // DB::commitTransaction();

          return $profissional;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    public function show(Profissional $profissional)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profissional $profissional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profissional $profissional)
    {
        //
    }

    public function shows(Profissional $profissional)
    {
      
    }
}
