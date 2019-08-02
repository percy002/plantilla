<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//get post put delete
Route::get('/', function () {
    return view('welcome');
});
Route::resource('tareas','TareasController');

Route::get('dashboard','DashboardController@index')->name('dashboard.index');

Route::resource('estudiantes','EstudiantesController');

Route::get('/tareas/buscar','TareasController@buscar');

Route::get('errores',function(){
    abort(404);  
});

