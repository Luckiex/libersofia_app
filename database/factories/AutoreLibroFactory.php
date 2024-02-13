<?php

namespace Database\Factories;

use App\Models\Autore;
use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AutoreLibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'autore_id' => Autore::factory(),
            'libro_id' => Libro::factory()
        ];
    }
}
