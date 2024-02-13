<?php

namespace App\Http\Controllers;

use App\Models\Autore;
use App\Models\Editoriale;
use App\Models\Libro;
use App\Models\Resenya;
use Illuminate\Http\Request;

class AutoreController extends Controller
{
    public function index()
    {
        $autores = Autore::all();

        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        $libros = Libro::all();
        return view('autores.crear', compact('libros'));
    }

    public function show($id)
    {
        $autor = Autore::with('libros')->find($id);
        return view('autores.mostrar', compact('autor'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
            'libros' => 'array'
        ]);
    
        $autor = Autore::create([
            'nombre' => $request->nombre,
            'nacionalidad' => $request->nacionalidad,
        ]);

        if ($request->has('libros')) {
            $autor->libros()->attach($request->libros);
        }
    
        return redirect()->route('autores.mostrar', $autor);
    }

    public function edit($autor)
    {
        $autor = Autore::with('libros')->find($autor);
        $libros = Libro::all();
        return view('autores.editar', compact('autor', 'libros'));
    }

    public function update (Request $request, Autore $autor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
            'libros.*' => 'exists:libros,id',
        ]);
    
        $autor = new Autore();
        $autor->nombre = $request->nombre;
        $autor->nacionalidad = $request->nacionalidad;
        $autor->save();
        
        $autor->libros()->attach($request->libros);

        return redirect()->route('autores.mostrar', $autor->id);
    }

    public function destroy(Autore $autor)
    {
        $autor->delete();
        
        return redirect()->route('autores.index');
    }
}
