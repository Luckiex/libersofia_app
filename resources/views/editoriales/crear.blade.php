<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  @vite('resources/css/app.css')
  <title>Libersofia</title>

</head>
<body>
    <x-cabecera />
    <form action="{{route('editoriales.guardar')}}" method="post">

        @csrf

        <div>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre"><br>

            @error('nombre')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror
        </div>
        <div>
            <label for="ubicacion">Ubicación:</label><br>
            <input type="text" id="ubicacion" name="ubicacion"><br>

            @error('ubicacion')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror
        </div>
        
        <div>
            <label for="libros">Libros:</label><br>   
            <select id="libros" name="libros[]" multiple>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select><br>   

            @error('libros[]')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror

        </div>
        
        
        <div>
            <button type="submit">Guardar editorial</button>
        </div>
    </form>
</body>
</html>