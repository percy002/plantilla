<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Test,Usuario};
use DB;//trabajar sin eloquent

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        // echo "estoy en index de dashboard";
        // $data = ['mensaje' => 'hola a todos','html' =>'<h1>lalala</h1>','clave'=>''];
        // return view('dashboard',$data);
        //todos
        $todos=Test::all();//todos los registros de esta tabla,50 reg
        // var_dump($todos);

        // foreach ($todos as $t) {
        //     # code...
        //     echo $t->nombre.' '.$t->numero."<br/>";
        // }

        //buscar por id
        $porid=Test::find(1);
        // $porUsuario=Usuario::find(1);
        
        //ejemplos where
        #select * from test where numero>5
        $where=Test::where('numero','>',5)->get();
        #select * from test where numero>5 and aleatorio<50
        $where2=Test::where('numero','',10)
                        ->where('aleatorio','<',50)
                        ->get();

        //contar
        $count=Test::count();
        
        // max
        $max=Test::max('aleatorio');

        $like=Test::where('nombre','like','B%')->limit(10)->get();

        $between=Test::whereBetween('numero',[5,15])->limit(10)->get();

        // $data=[
        //     'where'=>$where,
        //     'like'=>$where
        // ];
        // return view('dashboard',$data);
        return view('dashboard')->with(compact('like','where'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
