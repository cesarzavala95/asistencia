<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busCurso=trim($request->get('busCurso'));
        $busParalelo=trim($request->get('busParalelo'));
        $busFecha=trim($request->get('busFecha'));
        
        $asistencias=DB::table('alumnos')
        ->leftJoin('asistencias', 'alumnos.id', '=', 'asistencias.idAlumno')
        ->select('alumnos.id','alumnos.cedula','alumnos.nombre','alumnos.apellido','alumnos.curso','alumnos.paralelo','asistencias.fecha','asistencias.asistencia')
        ->where('alumnos.curso','LIKE','%'.$busCurso.'%')
        ->where('alumnos.paralelo','LIKE','%'.$busParalelo.'%')
        ->where('asistencias.fecha','LIKE','%'.$busFecha.'%')
        ->orderBy('alumnos.apellido','asc')
        ->paginate(30);
        
        //Codigo para traer lo creado el día de hoy
        /*foreach ($asistencias as $index => $alumno)
        {
            $asis= Asistencia::where(['idAlumno'=>$alumno->id])
            ->whereDate('created_at', $fechaFiltro)
            ->count();
            if($asis>0)
            {
                unset($asistencias[$index]);
            }
        }*/
        
       
        return view('asistencias.index', compact('asistencias'));
        
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAsis(Request $request)
    {
        
        $busCurso=trim($request->get('busCurso'));
        $busParalelo=trim($request->get('busParalelo'));
        $busApellido=trim($request->get('busApellido'));
        $busFecha=trim($request->get('busFecha'));
        
        
            if(!$busFecha){
                $busFecha =date('Y-m-d');
            }

        $asistencias=DB::table('asistencias')
        ->leftJoin('alumnos', 'asistencias.idAlumno', '=', 'alumnos.id')
        ->select('alumnos.id','alumnos.cedula','alumnos.nombre','alumnos.apellido','alumnos.curso','alumnos.paralelo','asistencias.fecha','asistencias.asistencia')
        ->where('alumnos.curso','LIKE','%'.$busCurso.'%')
        ->where('alumnos.paralelo','LIKE','%'.$busParalelo.'%')
        ->where('alumnos.apellido','LIKE','%'.$busApellido.'%')
        ->where('asistencias.fecha',"=",$busFecha)
        ->orderBy('alumnos.apellido','asc')
        ->paginate(30);
        return view('asistencias.editAsis', compact('asistencias'));
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
            public function create(Request $request)
            {

                if(!empty($_GET["studentId"]))
                {
                            $contador=0;
                            $id= $request->get('studentId');
                            $max=count($id);
                        
                        for($i=0;$i<$max;$i++)
                            {  
                        
                            $asist=$request->get('asist'.$id[$contador]);

                                DB::table('asistencias')->insert(
                                    ['fecha' => date('Y-m-d'),
                                    'asistencia' =>  $asist,
                                    'idAlumno' => $id[$contador],
                                    'created_at'=>now(),
                                    'updated_at'=>now()
                                    ]);

                                        $contador=$contador+1;

                            }
                    return redirect()->route('asistencias.index')
                    ->with('success','Datos Gaurdados.');
                }else{

                    return redirect()->route('asistencias.index')
                    ->with('success','No hay Datos para guardar.');

                }      
            } 
       
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actAsis(Request $request)
    {
        
        if(!empty($_GET["studentId"]))
        {
                    $contador=0;
                    $id= $request->get('studentId');
                    $acum=0;
                   
                    $max=count($id);
                    
                for($i=0;$i<$max/2;$i++)
                    {  
                
                    $asist=$request->get('asist'.$id[$contador]);
                   
                       

                        DB::table('asistencias')
                       
                        ->where('idAlumno','=', $id[$acum])
                        ->update(
                            [
                            'asistencia' =>  $asist
                            ]);

                                $contador=$contador+2;
                                $acum=$acum+2;

                 }
            return redirect()->route('asistencias.editAsis')
            ->with('success','Datos actualizados.');
        }else{

            return redirect()->route('asistencias.editAsis')
            ->with('success','No hay Datos para actualizar.');

        }
    }
       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        
        


    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
