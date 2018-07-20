<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Especialidade;
use App\Instituicao;
use App\Paciente;
use App\Profissional;
use App\ContraRreferencia;

class Referencia extends Model
{
    protected $hidden=['updated_at','deleted_at'];

    protected $fillable=['descricaoCaso','especialidade_id','instituicao_id','numSus_id','numConselho_id'];

    public function especialidade(){
      return $this->belongsTo(Especialidade::class, 'especialidade_id','id');
    }

    public function instituicao(){
      return $this->belongsTo(Instituicao::class, 'instituicao_id','id');
    }

    public function paciente(){
      return $this->belongsTo(Paciente::class, 'numSus_id','numSus');
    }

    public function profissional(){
      return $this->belongsTo(Profissional::class, 'numConselho_id','numConselho');
    }

    public function contraRreferencia(){
      return $this->hasOne(ContraRreferencia::class, 'referencia_id','id');
    }
}
