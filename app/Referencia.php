<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Especialidade;
use App\Instituicao;

class Referencia extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['descricaoCaso','especialidade_id','instituicao_id','numSus_id'];

    public function especialidade(){
      return $this->hasOne(Especialdiade::class, 'especialidade_id','id');
    }

    public function instituicao(){
      return $this->hasOne(Instituicao::class, 'instituicao_id','id');
    }
}
