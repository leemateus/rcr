<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profissional;

class Especialidade extends Model
{
    protected $hidden=['created_at','updated_at','deleted_at'];

    protected $fillable=['nome'];

    
}
