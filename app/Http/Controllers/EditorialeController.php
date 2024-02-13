<?php

namespace App\Http\Controllers;

use App\Models\Autore;
use App\Models\Editoriale;
use App\Models\Libro;
use Illuminate\Http\Request;

class EditorialeController extends Controller
{
    public function index()
    {
        $editoriales = Editoriale::all();

        return view('editoriales.index', compact('editoriales'));
    }

    public function create()
    {
        $libros = Libro::all();
        return view('editoriales.crear', compact('libros'));
    }

    public function show($id)
    {
        $editorial = Editoriale::with('libros')->find($id);
        return view('editoriales.mostrar', compact('editorial'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'libros' => 'array',
        ]);
    
        $editorial = new Editoriale([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);
        $editorial->save();


        $librosIds = $request->input('libros', []);

        if (!empty($librosIds)) {
            $libros = Libro::whereIn('id', $librosIds)->get();
            
            $editorial->libros()->saveMany($libros);
        }

        return redirect()->route('editoriales.mostrar', $editorial->id)
            ->with('success', 'Editorial creada correctamente.');
    }

    public function edit($editorial)
    {
        $editorial = Editoriale::with('libros')->find($editorial);
        $libros = Libro::all();
        return view('editoriales.editar', compact('editorial', 'libros'));
    }

    public function update (Request $request, Editoriale $editorial)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'libros' => 'array',
        ]);
    
        $editorial->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);
        
        foreach ($request->libros as $libroData) {
            // Verifica si $libroData es un array antes de acceder a sus elementos
            if (is_array($libroData)) {
                $libro = Libro::findOrFail($libroData['id']);
                $libro->update([
                    'titulo' => $libroData['titulo'],
                    // Actualiza más atributos de los libros según sea necesario
                    'editoriale_id' => $editorial->id
                ]);
        }
    }

        return redirect()->route('editoriales.mostrar', $editorial->id)
            ->with('success', 'Editorial actualizada correctamente.');
    }

    public function destroy(Editoriale $editorial)
    {
        $editorial->delete();
        
        return redirect()->route('editoriales.index');
    }
}
