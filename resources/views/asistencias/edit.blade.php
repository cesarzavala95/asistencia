@extends('asistencias.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edita Asistencia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('asistencias.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Existen problemas con el ingreso.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('asistencias.update',$asistencia->id_asis) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre Estu</strong>
                    <input type="text" name="id_alum" value="{{ $asistencia->id_alum }}" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    <input type="date" name="fecha_asis" value="{{ $asistencia->fecha_asis }}" class="form-control" placeholder="Apellido">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estado Asistencia:</strong>
                    {{ csrf_field() }}
            </br> <input type="radio" name="estado_asis" class="form-control" value="Presente">Presente
                    <input type="radio" name="estado_asis" class="form-control" value="Atraso">Atraso
                    <input type="radio" name="estado_asis" class="form-control" value="Falta">Falta
                </div>
            </div>
           
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
   
    </form>
@endsection