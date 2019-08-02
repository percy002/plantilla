<?php

use Illuminate\Database\Seeder;

class FakerseederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Entities\Test',50)->create();//tesFactory
    }
}
