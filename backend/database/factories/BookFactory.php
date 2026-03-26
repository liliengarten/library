<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'author' => $this->faker->name(),
            'description' => $this->faker->text(),
            'year' => $this->faker->year(),
            'available_copies' => $this->faker->randomDigit(),
        ];
    }
}
