<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    //protected $table='user';

    public function tareas(){
        //un suario puede tener muchas tareas
        return $this->hasMany(Tarea::class);
    }
}
