@extends('asistencias.layout')
 
@section('content')
<div class="row">
        
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <div>
                <h1></h1>
            </div>
            <h1></h1>
            <h2>Sistema de Ingreso de asistencias <!--<h4>Fecha:: {{date('Y-m-d')}}</h4>--> </h2>
            <h1></h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('asistencias.editAsis') }}"> Editar Asistencia</a>
           <!-- <a class="btn btn-success" href="{{ route('alumnos.index') }}"> Alumnos</a> -->
        </div>
    </div>
</div>
   
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<h1></h1>
<div class="col-x1-12">
    <form action="{{route('asistencias.index')}}" method="get">
        <div class="form-row">
            <div>
                <h1></h1>
            </div>
            <div class="col-sm-3 my-1">
                <input type="number" class="form-control" name="busCurso" placeholder="Ingrese Curso">
                

            </div>
            <div class="col-sm-3 my-1">
                <input type="text" class="form-control" name="busParalelo" placeholder="Ingrese Paralelo">
                

            </div>
            <div class="col-sm-3 my-1">
                <input type="text" class="form-control" name="busApellido" placeholder="Ingrese Apellido">
            </div>
            <div class="col-sm-2 my-1">
                <input type="Date" class="form-control" name="busFecha" >                
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
            <th>Cedula</th>
            <th>Nombres y Apellidos</th>            
            <th>Curso</th>
            <th>Paralelo</th> 
            <th>fecha</th>                       
            <th>Asistencia</th>
            <!--<th width="280px">Action</th>-->
        </tr>
        @foreach ($asistencias as $i=> $asistencia)
        <tr>

            <td>{{$i+1}}</td>
            <td>{{$asistencia->cedula}}</td>
            <td>{{$asistencia->nombre}} {{$asistencia->apellido}}</td>            
            <td>{{$asistencia->curso}}</td>
            <td>{{$asistencia->paralelo}}</td>
            <td>{{$asistencia->fecha}}</td>
            
            <input type="text" hidden name="studentId[]"  value="{{$asistencia->id}}">
            
            <!-- <fieldset>
                <td align="left">
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Presente" checked>Presente
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Atraso">Atraso
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Falta">Falta 
                </td>
            </fieldset>-->
            <td>{{$asistencia->asistencia}}</td>
     
            
        
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