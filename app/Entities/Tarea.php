<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //datos que puede almacenar el usuario
    protected $fillable=['titulo','descripcion','prioridad_id','tags'];
    
    //muchas tareas pueden pertenecer a un usuario
    public function usuarios(){
        return $this->belongsTo(usuario::class);
    }

    public function prioridad(){
        return $this->belongsTo(prioridad::class);//igual a un leftjoin
    }
}
