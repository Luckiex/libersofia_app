<?php

namespace Database\Seeders;

use App\Models\Resenya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResenyaSeeder extends Seeder
{
    public function run(): void
    {
        $resenya = new Resenya();

        $resenya->contenido = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque corrupti,
                             error cupiditate id voluptas aliquid cum quisquam consequatur mollitia sed 
                             a earum quidem sit nesciunt unde esse doloribus labore laboriosam?";
        $resenya->libro_id = 1;
        $resenya->save();


        $resenya2 = new Resenya();

        $resenya2->contenido = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque corrupti,
                             error cupiditate id voluptas aliquid cum quisquam consequatur mollitia sed 
                             a earum quidem sit nesciunt unde esse doloribus labore laboriosam?";
        $resenya2->libro_id = 2;
        $resenya2->save();


        $resenya3 = new Resenya();

        $resenya3->contenido = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque corrupti,
                             error cupiditate id voluptas aliquid cum quisquam consequatur mollitia sed 
                             a earum quidem sit nesciunt unde esse doloribus labore laboriosam?";
        $resenya3->libro_id = 3;
        $resenya3->save();

        Resenya::factory(10)->create();
    }
}
