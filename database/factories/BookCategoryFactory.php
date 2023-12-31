<?php

namespace Database\Factories;

use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array
     */

    protected $model = BookCategory::class;

    public function definition()
    {
        return [
            'category_name' => $this->faker->word,
            //
        ];
    }
}
