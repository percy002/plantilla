<?php

use Illuminate\Database\Seeder;

class prioridades_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $prioridades=[
            [
            'prioridad'=> 'alta',
            'create_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'update_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
            'prioridad'=> 'media',
            'create_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'update_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
            'prioridad'=> 'baja',
            'create_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'update_at'=>\Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        DB::table('prioridades')-> insert($prioridades);
    }
}
