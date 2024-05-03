<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class BookReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => $this->faker->numberBetween(1,10),
            'reviewer_name' => $this->faker->word(),
            'review' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(1,5)
        ];
    }
}
