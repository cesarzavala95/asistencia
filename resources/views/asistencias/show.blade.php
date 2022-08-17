@extends('asistencias.layout')
 
@section('content')
<div class="row">
        
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Sistema de asistencias</h2>
        </div>
        <div class="pull-right">
           <!-- <a class="btn btn-success" href="{{ route('asistencias.index') }}"> Editar Asistencia</a>-->
        </div>
    </div>
</div>
   
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="col-x1-12">
    <form action="{{route('asistencias.index')}}" method="get">
        <div class="form-row">
            <div class="col-sm-4 my-1">
                <input type="number" class="form-control" name="busCurso" placeholder="Ingrese Curso">
                

            </div>
            <div class="col-sm-4 my-1">
                <input type="text" class="form-control" name="busParalelo" placeholder="Ingrese Paralelo">
                

            </div>
            <div class="col-auto my-1">

                <input type="submit" class="btn btn-primary" value="Buscar" >
            </div>

        </div>

    </form>
</div>

<form action="{{route('asistencias.create')}}" method="get">
    <table border="" class="table table-bordered"  >
        <tr>
            <th>No</th>
            <th>Cedula Estudiante</th>
            <th>Nombre Alumno</th>
            <th>Apellido Alumno</th>
            <th>Curso Alumno</th>
            <th>Paralelo Alumno</th>
            <th>Fecha</th>
            <th>Estado</th>
            <!--<th width="280px">Action</th>-->
        </tr>
        @foreach ($asistencias as $i=> $asistencia)
        <tr>

            <td align="left">{{$i+1}}</td>
            <td align="left">{{$asistencia->cedula}}</td>
            <td align="left">{{$asistencia->nombre}}</td>
            <td align="left">{{$asistencia->apellido}}</td>
            <td align="left">{{$asistencia->curso}}</td>
            <td align="left">{{$asistencia->paralelo}}</td>
            <td align="left">{{ date('Y-m-d')}}</td>
            <input type="text" hidden name="studentId[]"  value="{{$asistencia->id}}">
            
            <fieldset>
                <td align="left">
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Presente" checked>Presente
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Atraso">Atraso
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Falta">Falta 
                </td>
            </fieldset>
        
     
            
        
        </tr>
        @endforeach
        
    </table>
    <div class="col-x1-12">
        <div class="col-auto my-1">

            <input type="submit" class="btn btn-primary" value="Guardar" >
        </div>
    </div>
</form>



  
@endsection