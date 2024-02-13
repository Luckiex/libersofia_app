<?php

namespace Database\Factories;

use App\Models\Editoriale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'editoriale_id' => Editoriale::factory(),
            'anyo_publicacion' => $this->faker->numberBetween(1500, 2024),
            'genero' => $this->faker->randomElement(['Fantasía','Romance','Ciencia ficción'])
        ];
    }
}
