<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contato;
use App\Endereco;
use App\Referencia;

class Paciente extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['numSus','nome','nomeMae'];

    public function contato(){
      return $this->hasOne(Contato::class, 'numSus_id','numSus');
    }

    public function endereco(){
      return $this->hasOne(Endereco::class, 'numSus_id','numSus');
    }

    public function referencias(){
      return $this->hasMany(Referencia::class, 'numSus_id','numSus');
    }
}
