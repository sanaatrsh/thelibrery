<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name(1, true);
        return [
            'name' => $name,
            'birth' => $this->faker->date(),
            'nationality' => $this->faker->realText(rand(10, 20)),
        ];
    }
}
