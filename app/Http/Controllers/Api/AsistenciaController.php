<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asistencia;
use App\Alumno;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Response as HttpResponse;
class AsistenciaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos= Alumno::all();
        return response()->json($alumnos);  
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
        
        $asistencia= Asistencia::create($request->all());
        return $asistencia;
        
       // return response()->json($asistencia);
       
        /*$asistencia= Asistencia::create($request->all());
        return response()->json([
        "message"=>"El Alumno ha sido creado creado correctamente",
         "data"=>$asistencia,
         "status"=>HttpResponse::HTTP_CREATED         

        ],HttpResponse::HTTP_CREATED);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        $asistencia= Asistencia::findOrFail($alumno->id);
      return response()->json([
            "alumno"=>$alumno,
            "asistencia"=>$asistencia,
            "data"=>$alumno,
            "status"=>HttpResponse::HTTP_OK,],HttpResponse::HTTP_OK);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return response()->json([
            "message"=>"El Alumno se actualizó correctamente",
            "data"=>$alumno,
            "status"=>HttpResponse::HTTP_OK,
        ],HttpResponse::HTTP_OK);


    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json([
            "message"=>"El Alumno se eliminó correctamente",
            "data"=>$alumno,
            "status"=>HttpResponse::HTTP_OK,],HttpResponse::HTTP_OK);
    }
}
