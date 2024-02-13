<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  @vite('resources/css/app.css')
  <title>Libersofia</title>

</head>
<body>
  <x-cabecera />
  <h1>Detalles del Autor</h1>
  <p><strong>Nombre:</strong> {{ $autor->nombre }}</p>
  <p><strong>Nacionalidad:</strong> {{ $autor->nacionalidad }}</p>

  <h2>Libros del Autor</h2>
  <ul>
      @foreach ($autor->libros as $libro)
          <li>{{ $libro->titulo }}</li>
      @endforeach
  </ul>
  <a href="{{route('autores.index')}}">Volver a autores</a>
  <a href="{{route('autores.editar', $autor)}}">Editar autor</a>
</body>
</html>