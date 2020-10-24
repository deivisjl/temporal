@extends('adminlte::page')

@section('title', 'Agregar Secretaria')



@section('content')


<div class="container">
    <div class="card border-info mb-3 " >
        <div class="card-header bg-info"><h1> Agregar Secretaria </h1></div>
        <div class="card-body text-info">
            <form action="{{route('secretarias.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nombreSe">Nombre</label>
                  <input type="text" name="nombreSe" class="form-control" id="nombreSe" value="{{old('nombreSe')}}" >
                  @error('nombreSe')
                      <br>
                      <small class="text-danger">*{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="correo">Email</label>
                  <input type="email" name="correo" class="form-control" id="correo" value="{{old('correo')}}">
                  @error('correo')
                      <br>
                      <small class="text-danger">*{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="number" name="telefono" class="form-control" id="telefono" value="{{old('telefono')}}">
                @error('telefono')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="fechaNac">Fecha de Nacimiento</label>
                    <input type="date" name="fechaNac" class="form-control" id="fechaNac" value="{{old('fechaNac')}}">
                @error('fechaNac')
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
