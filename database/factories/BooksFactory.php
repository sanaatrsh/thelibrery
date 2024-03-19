<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'author_id' => Author::inRandomOrder()->first()->id,
            'pages_number' => $this->faker->randomDigit(100,2000),
            'publisher' => $this->faker->city(),
            'publisher_date' => $this->faker->year(),
            'image' => 'https://picsum.photos/500/600',
            'description' => $this->faker->realText(),
        ];
    }
}
