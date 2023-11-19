<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Book::class;

    public function definition()
    {
        return [
            'author_id' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(1, 300),
            'title' => $this->faker->sentence,
        ];
    }
}
