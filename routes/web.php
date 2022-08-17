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

Route::get('/', function () {
    return view('welcome');
});


//Codigo para llamar  funciones nuevas del controlador
Route::resource('alumnos','AlumnoController');
Route::get('editAsis','AsistenciaController@editAsis')->name('asistencias.editAsis');

Route::get('actAsis','AsistenciaController@actAsis')->name('asistencias.actAsis');
Route::resource('asistencias','AsistenciaController');
//route::get('asistencias','AsistenciaController@prueba')->name('asistencias.prueba');
//route::get('asistencias','AsistenciaController@index')->name('asistencias.index');


