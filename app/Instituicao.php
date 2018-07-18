<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profissional;
use App\Referencia;

class Instituicao extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['nome'];

    public function profissionals(){
      return $this->hasMany(Profissional::class, 'instituicao_id');
    }

    public function referencias(){
      retunr $this->hasMany(Referencia::class, 'instituicao_id');
    }
}
