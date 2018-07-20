<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReferenciaResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'descricaoCaso' => $this->descricaoCaso,
          'especialidade_id' => $this->especialidade_id,
          'instituicao_id' => $this->instituicao_id,
          'numSus_id' => $this->numSus_id,
          'numConselho_id' => $this->numConselho_id,
          'contraRreferencia' => $this->contraRreferencia,
          'insituticao' => $this->instituicao,
          'especialidade' => $this->especialidade,
          'paciente' => $this->paciente,
          'profissional' => $this->profissional,
        ];
    }
}
