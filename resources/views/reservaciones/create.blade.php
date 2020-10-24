@extends('adminlte::page')

@section('title', 'Agregar Libro')



@section('content')


<div class="container">
    <div class="card border-info mb-3 " >
        <div class="card-header bg-info"><h1> Agregar Libro </h1></div>
        <div class="card-body text-info">
            <form action="{{route('libros.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="titulo">Titulo</label>
                  <input type="text" name="titulo" class="form-control" id="titulo" value="{{old('titulo')}}" >
                  @error('titulo')
                      <br>
                      <small class="text-danger">*{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="editorial">Editorial</label>
                  <input type="text" name="editorial" class="form-control" id="editorial" value="{{old('editorial')}}">
                  @error('editorial')
                      <br>
                      <small class="text-danger">*{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" class="form-control" id="autor" value="{{old('autor')}}">
                @error('autor')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" value="{{old('stock')}}">
                @error('stock')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control" id="imagen">
                </div>
                <div class="row justify-content-around">
                    <a> <button class="btn btn-secondary btn-lg">Atras</button> </a>   <button type="submit" class="btn btn-info btn-lg">Agregar</button>
                </div>


              </form>
        </div>
      </div>
</div>

@endsection
