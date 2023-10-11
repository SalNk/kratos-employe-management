<?php

namespace Database\Factories;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departement>
 */
class DepartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle,
            'status' => fake()->randomElement(['Actif', 'En congé', 'Suspendu']),
            'color' => function (array $attributes) {
                $colorMap = [
                    'Actif' => 'bg-success',
                    'En congé' => 'bg-info',
                    'Suspendu' => 'bg-danger'
                ];
                return $colorMap[$attributes['status']];
            }
        ];
    }
}