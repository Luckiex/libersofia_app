<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  @vite('resources/css/app.css')
  <title>Libersofia</title>

</head>
<body>
    <x-cabecera />
    <form action="{{route('libros.actualizar', $libro)}}" method="post">

        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="{{ $libro->titulo }}"><br>
        
            @error('titulo')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror
        </div>
        <div>
            <label for="editorial_id">Editorial:</label><br>
            <select id="editorial_id" name="editorial_id">
                @foreach($editoriales as $editorial)
                    <option value="{{ $editorial->id }}" {{ $libro->editoriale_id == $editorial->id ? 'selected' : '' }}>
                        {{ $editorial->nombre }}
                    </option>
                @endforeach
            </select><br>

            @error('editorial_id')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror

        </div>
        <div>
            <label for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido">{{ $libro->resenya ? $libro->resenya->contenido : '' }}</textarea><br>
        
            @error('contenido')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror
        </div>
        <div>
            <label for="autores">Autores:</label><br>   
            <select id="autores" name="autores[]" multiple>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}" {{ in_array($autor->id, $libro->autores->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $autor->nombre }}
                    </option>
                @endforeach
            </select><br>   

            @error('autores[]')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror

        </div>
        <div>
            <label for="anyo_publicacion">Año de Publicación:</label><br>
            <input type="number" id="anyo_publicacion" name="anyo_publicacion" value="{{ $libro->anyo_publicacion }}"><br>
        
            @error('anyo_publicacion')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror
        </div>
        <div>
            <label for="genero">Género:</label><br>
            <input type="text" id="genero" name="genero" value="{{ $libro->genero }}"><br>
        
            @error('genero')
            <br>
            <span>* {{$message}}</span>
            <br>                
            @enderror
        </div>
        <div>
            <button type="submit">Guardar Libro</button>
        </div>
    </form>
</body>
</html>