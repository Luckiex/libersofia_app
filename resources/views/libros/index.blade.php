<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  @vite('resources/css/app.css')
  <title>Libersofia</title>

</head>
<body>
    <x-cabecera />
    <x-botonLibros tipo="crear"/>
    <x-tablaLibros :libros="$libros"/>
</body>
</html>