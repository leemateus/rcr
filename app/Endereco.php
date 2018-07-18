<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Paciente;

class Endereco extends Model
{
  protected $hidden=['created_at','updated_at','deleted_at'];

  protected $fillable=['logradouro','bairro','numero','cidade','complemento'];

  public function paciente(){
    return $this->hasOne(Paciente::class, 'numSUs_id','numSus');
  }
}
