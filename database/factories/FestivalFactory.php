<?php

namespace Database\Factories;

use App\Models\FestivalCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'festival_category_id' => FestivalCategory::factory(),
            'name' => $this->faker->name,
            'banner_img' => $this->faker->filePath(),
            'slug' => $this->faker->slug,
            'date' => $this->faker->dateTime,
            'location' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'likes' => $this->faker->numberBetween(0, 1000000)
        ];
    }
}
