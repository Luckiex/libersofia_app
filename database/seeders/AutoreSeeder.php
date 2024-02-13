<?php

namespace Database\Seeders;

use App\Models\Autore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoreSeeder extends Seeder
{
    public function run(): void
    {
        $autor = new Autore();

        $autor->nombre = "Brandon Sanderson";
        $autor->nacionalidad = "Estadounidense";
        $autor->save();

        $autor2 = new Autore();

        $autor2->nombre = "Dio Brando";
        $autor2->nacionalidad = "Japonés";
        $autor2->save();

        $autor3 = new Autore();

        $autor3->nombre = "Spiderman";
        $autor3->nacionalidad = "Estadounidense";
        $autor3->save();

        Autore::factory(10)->create();
    }
}
