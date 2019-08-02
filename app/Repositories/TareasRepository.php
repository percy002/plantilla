<?php
namespace App\Repositories;

use App\Entities\Tarea;
class TareasRepository{
    public function porUsuario($id){
        return Tarea::where('user_id',$id)->orderBy('created_at','asc')->get();
    }
    //leftjoin,rightjoin,join
    //leftjoin(tabla,atributos,operacion,atributos tabla 2)
    public function porPrioridad($id,$prioridad_id){
        return Tarea::where('user_id',$id)
        ->where('prioridad_id',$prioridad_id)
        ->get();
    }
}

?>