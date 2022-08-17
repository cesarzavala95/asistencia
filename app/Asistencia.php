<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable=[
        
        
        "fecha",
        "asistencia",
        "idAlumno"
    ];

    public function alumno(){
        return $this->belongsTo('App\Alumno','idAlumno');
    }

    
    
}
