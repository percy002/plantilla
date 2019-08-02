<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Tarea,Prioridad};
use App\Repositories\TareasRepository;
use Carbon\Carbon;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(TareasRepository $tareas){
        $this->tareas=$tareas;
    }
    public function index()
    {
        // $tareas=Tarea::all();
        // return view('tareas.index')->with(compact('tareas'));

        //retornar toda la tabla
        // $tareas = Tarea::all();
        // var_dump($tareas);
        
        // $tareas=Tarea::where('user_id',1)->get();
        // $tareas=$this->tareas->porUsuario(1);
        // $tareasporPriorodad=$this->tareas->porPrioridad(1,1);
        // // foreach ($tareas as $tarea) {
        // //     echo $tarea->titulo.'</br>';
        // // }
        // foreach ($tareasporPriorodad as $tareaprioridad) {
        //     // echo $tareaprioridad->titulo.'</br>';
        //     $tareaprioridad->titulo;
        //     $tareaprioridad->prioridad['id'];
        //     $tareaprioridad->prioridad['prioridad'];
        // }

        try {
            $tareas=Tarea::all();
        } catch (Exception $e) {
            //para que los errores sen mas descritptivos
            //log::debug('Error en consulta'.$e->getMessage());
            echo ".";
        }
        
        return view('tareas.index')->with(compact('tareas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prioridades = Prioridad::all();
        //action apunta a tareas storm, ya que es
        //la encargada de guardar la primera vez un registro

        $action = route('tareas.store');
        $tarea = new Tarea();
        return view('tareas.crear')->with(compact('prioridades','action','tarea'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //3 formas de guardar en laravel
        //opc1 para pocos campos, para todos necesitamos request
        // $tarea= new Tarea(); //tareas
        // $tarea->titulo=$request->input('titulo');
        // $tarea->descripcion=$request->input('descripcion');
        // $tarea->prioridad_id=$request->input('prioridad_id');
        // $tarea->user_id=1;
        // $tarea->save();

        //opcion 2 es neceio colocar el valor de create_at y update_At
        // $titulo= $request->input('titulo');
        // $descripcion= $request->input('descripcion');
        // $prioridad_id= $request->input('prioridad_id');
        // $user_id= 1;
        
        // $tarea =[
        //     'titulo'=>$titulo,
        //     'descripcion'=>$descripcion,
        //     'prioridad_id'=>$prioridad_id,
        //     'user_id'=>$user_id,
        //     'created_at'=>Carbon::now(),
        //     'updated_at'=>Carbon::now()
        // ];

        // Tarea::insert($tarea);

        //validacion a travez de una lista
        list($rules,$messages)=$this->_rules();
        $this->validate($request,$rules,$messages);

        //opcion 3* cuando tenemos muchos campos, los nombres de los campos en el formulario
        //deben tener el mismo nombre de los atributos de la tabla
        $tarea= new Tarea($request->input());
        $tarea->user_id=1;
        $tarea->save();
        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $prioridades=Prioridad::all();
        $put=true;
        $action=route('tareas.update',['id'=>$id]);

        return view('tareas.actualizar')->with(compact('tarea','action','prioridades','put'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        $tarea->titulo=$request->input('titulo');
        $tarea->descripcion=$request->input('descripcion');
        $tarea->prioridad_id=$request->input('prioridad_id');
        $tarea->user_id=1;
        $tarea->save();

        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea=Tarea::find($id);
        $tarea->delete();

        return back();
    }

    #reglas de validacion
    private function _rules(){
        $messages=[
            'titulo.required' => 'el titulo es requerido',
            'titulo.min'=> 'minimo 5 caracteres',
            'descripcion.required' => 'escribe una descripcion para la tarea',
            'prioridad_id.not_in' => 'No puede ser 0',
            'prioridad_id.required' => 'seleccione una prioridad',

        ];
        $rules =[
            'titulo' => 'required|min:5',
            'descripcion' => 'required',
            'prioridad' => 'required|not_in:0'
        ];

        return array($rules,$messages);
    }
}
