<?php

use Illuminate\Database\Seeder;

class prioridadtableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $prioridades = [
            [
                'prioridad'=>'alta',
                'created_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'prioridad'=>'media',
                'created_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'prioridad'=>'baja',
                'created_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];
        DB::table('prioridades')->insert($prioridades);
    }
}
