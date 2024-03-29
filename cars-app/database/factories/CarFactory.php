<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carCompanies = ['Honda', 'Ferrari', 'Volvo', 'Saab', 'Hyundai', 'Skoda', 'Bugatti', 'Fiat', 'Ciroën', 'Renault', 'Volkswagen', 'Kia', 'Toyota', 'Audi', 'Seat'];
        $regNr = strtoupper(fake()->lexify('???')) . '-' . strval(fake()->numberBetween(99, 999));

        return [
            'model' => fake()->word(),
            'make' => fake()->randomElement($carCompanies),
            'reg_nr' => $regNr,
            'owner' => fake()->name(),
            'fine' => fake()->numberBetween(100, 7000),
            'user_id' => fake()->randomElement(User::pluck('id'))
            //
        ];
    }
}
