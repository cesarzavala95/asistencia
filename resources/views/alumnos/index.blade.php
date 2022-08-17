@extends('alumnos.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sistema de Alumnos realizado en laravel</h2>
            </div>
            <div class="pull-right">
                  
                <a class="btn btn-success" href="{{ route('asistencias.index') }}"> Asistencias</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   

   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Curso</th>
            <th>Paralelo</th>
            <th>Seccion</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($alumnos as $alumno)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $alumno->cedula }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->apellido }}</td>
            <td>{{ $alumno->curso }}</td>
            <td>{{ $alumno->paralelo }}</td>
            <td>{{ $alumno->seccion }}</td>
            
            <td>
                <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('alumnos.show',$alumno->id) }}">Detalle</a>
    
                    <a class="btn btn-primary" href="{{ route('alumnos.edit',$alumno->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                     <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $alumnos->links() !!}
      
@endsection