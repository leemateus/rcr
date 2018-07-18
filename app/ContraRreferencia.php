<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Referencia;

class ContraRreferencia extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['referencia_id','diagnostico','condutaAdotada'];

    public function referencia(){
      return $this->hasOne(Referencia::class, 'referencia_id','id');
    }
}
