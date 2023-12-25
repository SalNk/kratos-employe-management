<?php

namespace Database\Factories;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom" => $this->faker->name,
            "prenom" => $this->faker->lastName,
            "email" => $this->faker->email,
            "contact" => $this->faker->phoneNumber,
            "departement_id" => Departement::all()->random()->id,
        ];
    }
}