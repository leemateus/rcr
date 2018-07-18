<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Paciente;

class Contato extends Model
{
  use SoftDeletes;

  protected $hidden=['created_at','updated_at','deleted_at'];

  protected $fillable=['celular','fixo','numSus'];

  public function paciente(){
    return $this->hasOne(Paciente::class, 'numSus_id','numSus');
  }

}
