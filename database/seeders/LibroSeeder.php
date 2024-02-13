<?php

namespace Database\Seeders;

use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $libro = new Libro();

        $libro->titulo = "El imperio final";
        $libro->editoriale_id = 1;
        $libro->anyo_publicacion = 2005;
        $libro->genero = "Fantasía";
        $libro->save();


        $libro2 = new Libro();

        $libro2->titulo = "El pozo de la ascensión";
        $libro2->editoriale_id = 2;
        $libro2->anyo_publicacion = 2007;
        $libro2->genero = "Fantasía";
        $libro2->save();


        $libro3 = new Libro();

        $libro3->titulo = "El heroe de los eras";
        $libro3->editoriale_id = 3;
        $libro3->anyo_publicacion = 2009;
        $libro3->genero = "Fantasía";
        $libro3->save();

        Libro::factory(10)->create();
    }
}
