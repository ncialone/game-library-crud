<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videogame>
 */
class VideogameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //Creamos nombre inventado + categoria random entre la cant de ids que hay en base de datos
            'name' => $this->faker->name(),
            'category_id' => $this->faker->randomElement([1,2,3,4])
        ];
    }
}
