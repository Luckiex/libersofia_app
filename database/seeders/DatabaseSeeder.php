<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AutoreLibro;
use Database\Factories\AutoreLibroFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(EditorialeSeeder::class);
        $this->call(LibroSeeder::class);
        $this->call(ResenyaSeeder::class);
        $this->call(AutoreSeeder::class);
    }
}
