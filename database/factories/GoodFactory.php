<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GoodFactory extends Factory
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
            'category_id' => Category::get()->random()->id,
            'description' => $this->faker->sentence(20),
            'old_price'   => rand(10000, 15000),
            'new_price'   => rand(5000, 8000)
        ];
    }
}
