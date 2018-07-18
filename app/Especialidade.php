<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profissional;
use App\Referencia;

class Especialidade extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['nome'];

    public function profissionals(){
      return $this->hasMany(Profissional::class, 'especialidade_id');
    }

    public function referencias(){
      return $this->hasMany(Referencia::class, 'especialidade_id');
    }


}
