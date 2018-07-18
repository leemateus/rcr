<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['nunSus','nome','nomeMae'];
}
