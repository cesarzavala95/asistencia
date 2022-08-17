@extends('asistencias.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ingresar nueva Asistencia de estudiante</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('asistencias.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Existen Problemas con el ingreso<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('asistencias.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de estudiante:</strong>
                <input type="text" name="id_alum" class="form-control" placeholder="Nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de Asistencia:</strong>
                <input type="date" name="fecha_asis" class="form-control" placeholder="Fecha Asistencia">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado Asistencia:</strong>
                {{ csrf_field() }}
            </br><label style="float:left"> <input type="radio" name="estado_asis" class="form-control" value="Presente">Presente</label>
                <label style="float:left">   <input type="radio" name="estado_asis" class="form-control" value="Atraso">Atraso</label>
                    <label style="float:left">  <input type="radio" name="estado_asis" class="form-control" value="Falta">Falta</label>
                
            </div>
        </div>
        
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection