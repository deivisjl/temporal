@extends('adminlte::page')

@section('title', 'Actualizar Libro')

@section('plugins.Sweetalert2', true)


@section('content')


<div class="container">
    <div class="card border-info mb-3 " >
        <div class="card-header bg-info"><h1> Actualizar Libro </h1></div>
        <div class="card-body text-info">
            <form action="{{route('libros.update', $libro)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="titulo">Titulo</label>
                  <input type="text" name="titulo" class="form-control" id="titulo" value="{{$libro->titulo}}" >
                </div>
                <div class="form-group">
                  <label for="editorial">Editorial</label>
                  <input type="text" name="editorial" class="form-control" id="editorial" value="{{$libro->editorial}}">
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" class="form-control" id="autor" value="{{$libro->autor}}">
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" value="{{$libro->stock}}">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <img src="{{asset('/img/libros/'.$libro->imagenLibro.'')}}" width="65px" height="65px">
                    <input type="file" name="imagen" class="form-control" id="imagen" >
                </div>
                <div class="row justify-content-around">
                    <a> <button class="btn btn-secondary btn-lg">Atras</button> </a>   <button type="submit" class="btn btn-info btn-lg">Actualizar</button>
                </div>


              </form>
        </div>
      </div>
</div>


@endsection

@section('js')
<script>
Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
</script>
@stop
