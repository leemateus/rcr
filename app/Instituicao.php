<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['nome'];
}
