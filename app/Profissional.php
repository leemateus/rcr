<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Especialidade;
use App\Instituicao;
use App\Referencia;
use App\User;

class Profissional extends Model
{

    protected $primaryKey='numConselho';

    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['numConselho','nome','especialidade_id','instituicao_id'];

    public function especialidade(){
      return $this->belongsTo(Especialidade::class, 'especialidade_id','id');
    }

    public function instituicao(){
      return $this->belongsTo(Instituicao::class, 'instituicao_id','id');
    }

    public function referencias(){
      return $this->hasMany(Referencia::class, 'numConselho_id','numConselho');
    }

    public function user(){
      return $this->hasOne(User::class, 'numConselho_id');
    }

}
