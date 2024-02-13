<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  @vite('resources/css/app.css')
  <title>Libersofia</title>

</head>
<body>
  <x-cabecera />
  <h1 class="text-4xl font-bold">{{ $libro->titulo }}</h1>
  @if ($libro->editorial)
    <p>Editorial: {{ $libro->editorial->nombre }}</p>
  @endif
  <p>Año de publicación: {{ $libro->anyo_publicacion }}</p>
  <p>Género: {{ $libro->genero }}</p>
  <p>Autores:</p>
  <ul>
      @foreach($libro->autores as $autor)
          <li>{{ $autor->nombre }}</li>
      @endforeach
  </ul>
  <a href="{{route('libros.index')}}">Volver a cursos</a>
  <a href="{{route('libros.editar', $libro)}}">Editar libro</a>
</body>
</html>