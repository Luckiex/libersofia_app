<?php

namespace App\Http\Controllers;

use App\Models\Autore;
use App\Models\Editoriale;
use App\Models\Libro;
use App\Models\Resenya;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function __invoke()
    {
        return view('libros.index');
    }

    public function index()
    {
        $libros = Libro::all();

        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $editoriales = Editoriale::all();
        $autores = Autore::all();
        return view('libros.crear', compact('editoriales', 'autores'));
    }

    public function show($id)
    {
        $libro = Libro::with('editorial','autores')->find($id);
        return view('libros.mostrar', compact('libro'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'editorial_id' => 'required|exists:editoriales,id',
            'contenido' => 'required|string',
            'autores' => 'required|array|min:1',
            'autores.*' => 'exists:autores,id',
            'anyo_publicacion' => 'required|integer|min:1900|max:' . date('Y'),
            'genero' => 'required|string|max:255',
        ]);
    
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->editoriale_id = $request->editorial_id;
        $libro->anyo_publicacion = $request->anyo_publicacion;
        $libro->genero = $request->genero;
        $libro->save();
    
        $resenya = new Resenya();
        $resenya->contenido = $request->contenido;
        $resenya->libro_id = $libro->libro_id;
        $libro->resenya()->save($resenya);
    
        $libro->autores()->attach($request->autores);
    
        return redirect()->route('libros.mostrar', $libro);
    }

    public function edit($libro)
    {
        $libro = Libro::with('editorial','autores')->find($libro);
        $editoriales = Editoriale::all();
        $autores = Autore::all();
        return view('libros.editar', compact('libro', 'editoriales', 'autores'));
    }

    public function update (Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'editorial_id' => 'required|exists:editoriales,id',
            'contenido' => 'required|string',
            'autores' => 'required|array|min:1',
            'autores.*' => 'exists:autores,id',
            'anyo_publicacion' => 'required|integer|min:1900|max:' . date('Y'),
            'genero' => 'required|string|max:255',
        ]);
    
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->editoriale_id = $request->editorial_id;
        $libro->anyo_publicacion = $request->anyo_publicacion;
        $libro->genero = $request->genero;
        $libro->save();
    
        if ($libro->resenya) {
            $resenya = $libro->resenya;
            $resenya->contenido = $request->contenido;
            $resenya->save();
        } else {
            if ($request->filled('contenido')) {
                $resenya = new Resenya();
                $resenya->contenido = $request->contenido;
                $libro->resenya()->save($resenya);
            }
        }
    
        $libro->autores()->attach($request->autores);
    
        return redirect()->route('libros.mostrar', $libro);
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        
        return redirect()->route('libros.index');
    }
}
