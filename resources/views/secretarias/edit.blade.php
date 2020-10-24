@extends('adminlte::page')

@section('title', 'Actualizar Secretaria')

@section('plugins.Sweetalert2', true)


@section('content')


<div class="container">
    <div class="card border-info mb-3 " >
        <div class="card-header bg-info"><h1> Actualizar Secretaria </h1></div>
        <div class="card-body text-info">
            <form action="{{route('secretarias.update', $secretaria)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="nombreSe">Nombre</label>
                  <input type="text" name="nombreSe" class="form-control" id="nombreSe" value="{{$secretaria->nombreSe}}" >
                </div>
                <div class="form-group">
                  <label for="correo">E-mail</label>
                  <input type="email" name="correo" class="form-control" id="correo" value="{{$secretaria->correo}}">
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="number" name="telefono" class="form-control" id="telefono" value="{{$secretaria->telefono}}">
                </div>
                <div class="form-group">
                    <label for="fechaNac">Fecha de Nacimiento</label>
                    <input type="date" name="fechaNac" class="form-control" id="fechaNac" value="{{$secretaria->fechaNac}}">
                </div>

                <div class="row justify-content-around">
                    <a> <button class="btn btn-secondary btn-lg">Atras</button> </a>   <button type="submit" class="btn btn-info btn-lg">Actualizar</button>
                </div>


              </form>
        </div>
      </div>
</div>


@endsection


