<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Entities\Test::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
        'correo'=> $faker->unique()->safeEmail,
        'token'=> str_random(10),
        'descripcion'=> $faker->text,
        'telefono'=> $faker->phoneNumber,
        'direccion'=> $faker->address,
        'numero'=> $faker->randomDigit,
        'fecha'=> \Carbon\Carbon::now()->format('Y-m-d'),
        'hora'=> \Carbon\Carbon::now()->format('H:i:s'),
        'username'=> $faker->userName,
        'hex'=> $faker->hexcolor,
        'imagen'=> $faker->imageUrl(300,300,'cats',true,'Faker'),#http://lorempixel.com/300/300/cat/faker
        'aleatorio'=> $faker->numberBetween(1,500)
    ];
});
