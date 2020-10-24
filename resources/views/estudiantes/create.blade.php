@extends('adminlte::page')

@section('title', 'Agregar Estudiante')



@section('content')


<div class="container">
    <div class="card border-info mb-3 " >
        <div class="card-header bg-info"><h1> Agregar Estudiante </h1></div>
        <div class="card-body text-info">
            <form action="{{route('estudiantes.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nombreEs">Nombre</label>
                  <input type="text" name="nombreEs" class="form-control" id="nombreEs" value="{{old('nombreEs')}}" >
                  @error('nombreEs')
                      <br>
                      <small class="text-danger">*{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="carrera">Carrera</label>
                  <input type="text" name="carrera" class="form-control" id="carrera" value="{{old('carrera')}}">
                  @error('carrera')
                      <br>
                      <small class="text-danger">*{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="carnet">Carnet</label>
                    <input type="text" name="carnet" class="form-control" id="carnet" value="{{old('carnet')}}">
                @error('carnet')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="correo">E-mail</label>
                    <input type="email" name="correo" class="form-control" id="correo" value="{{old('correo')}}">
                @error('correo')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                @enderror
                </div>

                <div class="row justify-content-around">
                    <a> <button class="btn btn-secondary btn-lg">Atras</button> </a>   <button type="submit" class="btn btn-info btn-lg">Agregar</button>
                </div>


              </form>
        </div>
      </div>
</div>

@endsection
