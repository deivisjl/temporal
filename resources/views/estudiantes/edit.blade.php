@extends('adminlte::page')

@section('title', 'Actualizar Estudiante')

@section('plugins.Sweetalert2', true)


@section('content')


<div class="container">
    <div class="card border-info mb-3 " >
        <div class="card-header bg-info"><h1> Actualizar Estudiante </h1></div>
        <div class="card-body text-info">
            <form action="{{route('estudiantes.update', $estudiante)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="nombreEs">Nombre</label>
                  <input type="text" name="nombreEs" class="form-control" id="nombreEs" value="{{$estudiante->nombreEs}}" >
                </div>
                <div class="form-group">
                  <label for="carrera">Carrera</label>
                  <input type="text" name="carrera" class="form-control" id="carrera" value="{{$estudiante->carrera}}">
                </div>
                <div class="form-group">
                    <label for="carnet">Carnet</label>
                    <input type="text" name="carnet" class="form-control" id="carnet" value="{{$estudiante->carnet}}">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" class="form-control" id="correo" value="{{$estudiante->correo}}">
                </div>

                <div class="row justify-content-around">
                    <a> <button class="btn btn-secondary btn-lg">Atras</button> </a>   <button type="submit" class="btn btn-info btn-lg">Actualizar</button>
                </div>


              </form>
        </div>
      </div>
</div>


@endsection


