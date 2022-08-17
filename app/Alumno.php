<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable=
    ["cedula",
    "nombre",
    "apellido",
    "curso",
    "paralelo",
    "seccion"];


    public function asistencias(){
        return $this->hasMany('App\Asistencia','id','id');
    } 
}


