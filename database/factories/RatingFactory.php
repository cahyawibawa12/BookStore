<?php

namespace Database\Factories;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Rating::class;
    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(1, 10),
            'book_id' => $this->faker->numberBetween(1, 10000),
        ];
    }
}
