<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  @vite('resources/css/app.css')
  <title>Libersofia</title>

</head>
<body>
    <x-cabecera />
    <x-botonEditoriales tipo="crear"/>
    <x-tablaEditoriales :editoriales="$editoriales"/>
</body>
</html>