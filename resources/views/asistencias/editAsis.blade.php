@extends('asistencias.layout')
 
@section('content')
<div class="row">
        
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <div>
                <h1></h1>
            </div>
            <h1></h1>
            <h2>Sistema de Edicion de asistencias- Fecha {{date('Y-m-d')}}</h2>
            <h1></h1>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('asistencias.index') }}"> Inicio </a>
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
    <form action="{{route('asistencias.editAsis')}}" method="get">
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

<form action="{{route('asistencias.actAsis')}}" method="get">
    <table border="" class="table table-bordered"  >
        <tr>
            <th>No</th>
            <th>Cedula </th>
            <th>Nombre y Apellido</th>           
            <th>Curso </th>
            <th>Paralelo </th>
            <th>Fecha</th>
            <th>Estado</th>
            <!--<th width="280px">Action</th>-->
        </tr>
        @foreach ($asistencias as $i=> $asistencia)
        <tr>
            <input type="text" hidden name="studentId[]"  value="{{$asistencia->id}}">
            <input type="text" hidden name="studentId[]"  value="{{$asistencia->asistencia}}">
            <td align="left">{{$i+1}}</td>
            <td align="left">{{$asistencia->cedula}}</td>
            <td align="left">{{$asistencia->nombre}} {{$asistencia->apellido}}</td>          
            <td align="left">{{$asistencia->curso}}</td>
            <td align="left">{{$asistencia->paralelo}}</td>
            <td align="left">{{$asistencia->fecha}}</td>
            
            
            
            <fieldset>
                <td align="left">
                     
                   <?php
                    $estAsis= $asistencia->asistencia;
                    if ($estAsis=="Presente") {
                     ?>
                         <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Presente" checked>Presente
                         <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Atraso">Atraso
                         <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Falta">Falta 

                         <?php
                    } elseif($estAsis=="Atraso") {
                        ?>
                         <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Presente">Presente
                         <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Atraso"checked>Atraso
                         <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Falta">Falta 
                         <?php
                    }elseif($estAsis=="Falta"){
                        ?>
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Presente">Presente
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Atraso">Atraso
                        <input type="radio" id="asist{{$asistencia->id}}" name="asist{{$asistencia->id}}" value="Falta"checked>Falta 
                        <?php
                    }
                    
                   ?>
                   
                    
                    
                           </td>
            </fieldset>
        
     
            
        
        </tr>
        @endforeach
        
    </table>
    <div class="col-x1-12">
        <div class="col-auto my-1">

            <input type="submit" class="btn btn-primary" value="Actualizar" >
        </div>
    </div>
</form>



  
@endsection