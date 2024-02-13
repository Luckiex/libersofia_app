<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  @vite('resources/css/app.css')
  <title>Libersofia</title>

</head>
<body>
  <x-cabecera />
  <h1>{{ $editorial->nombre }}</h1>
  <p>Ubicación: {{ $editorial->ubicacion }}</p>
  <p>Libros publicados:</p>
  <ul>
      @foreach($editorial->libros as $libro)
          <li>{{ $libro->titulo }}</li>
      @endforeach
  </ul>
  <a href="{{route('editoriales.index')}}">Volver a editoriales</a>
  <a href="{{route('editoriales.editar', $editorial)}}">Editar editorial</a>
</body>
</html>