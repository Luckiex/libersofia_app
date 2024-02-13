<?php

namespace Database\Seeders;

use App\Models\Editoriale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditorialeSeeder extends Seeder
{
    public function run(): void
    {
        $editorial = new Editoriale();

        $editorial->nombre = "Ediciones A";
        $editorial->ubicacion = "España, Elda, ...";
        $editorial->save();


        $editorial2 = new Editoriale();

        $editorial2->nombre = "Ediciones B";
        $editorial2->ubicacion = "Letonia, Pepe, ...";
        $editorial2->save();


        $editorial3 = new Editoriale();

        $editorial3->nombre = "Ediciones C";
        $editorial3->ubicacion = "Uganda, ...";
        $editorial3->save();

        Editoriale::factory(10)->create();
    }
}
