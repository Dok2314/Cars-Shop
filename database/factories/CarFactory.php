<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word;

        return [
            'title'       => $title,
            'slug'        => Str::slug($title),
            'mark'        => $this->faker->word,
            'category_id' => Category::get()->random()->id,
            'small_description' => $this->faker->sentence(50),
            'description' => $this->faker->sentence(50),
            'old_price'   => rand(100000, 120000),
            'new_price'   => rand(75000, 89000)
        ];
    }
}
