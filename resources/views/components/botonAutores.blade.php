@props(['tipo' => 'crear', 'id' => 1])

@php
    switch ($tipo) {
        case 'editar':
            $texto = "Editar";
            $ruta = route('autores.editar', $id);
            $css = "bg-blue-500 hover:bg-blue-700";
            break;
        
        case 'borrar':
            $texto = "Borrar";
            $ruta =  route('autores.borrar', $id); 
            $css = "bg-red-500 hover:bg-red-700";
            break;

        case 'crear':
            $texto = "Crear autor";
            $ruta = route('autores.crear');
            $css = "bg-green-500 hover:bg-green-700 m-10";
            break;
        default:
            # code...
            break;
    }
@endphp


    @if ($tipo === 'borrar')
    <form action="{{$ruta}}" method="POST">
        @csrf
        @method('delete')
        <button class="text-white font-bold py-2 px-4 rounded-full {{$css}}" type="submit">{{ $texto }}</button>
        
    </form>    
    @else 
    <button class="text-white font-bold py-2 px-4 rounded-full {{$css}}" type="submit">
        <a href="{{ $ruta }}">{{$texto}}</a>
    </button>
    @endif
</button>