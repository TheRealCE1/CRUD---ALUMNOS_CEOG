<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories.Factory<\App\Models\Seccion>
 */
class SeccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seccion' => $this->faker->randomElement([
                'A1','A2','A3','B1','B2','B3','C1','C2','C3','D1','D2','D3','E1','E2','E3'
            ]),
            'aula' => strtoupper($this->faker->bothify('Aula ##')),
        ];
    }
}
