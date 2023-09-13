<?php

namespace Database\Factories;

use App\Models\EventCategory;
use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'festival_id' => $this->faker->numberBetween(1, Festival::count()),
            'event_category_id' => EventCategory::factory(),
            'name' => $this->faker->name,
            'banner_img' => $this->faker->filePath(),
            'slug' => $this->faker->slug,
            'date' => $this->faker->dateTime,
            'latitude' => $this->faker->numberBetween(0, 100),
            'longitude' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->paragraph,
            'likes' => $this->faker->numberBetween(0, 1000000)  //randomNumber
            //

        ];
    }
}
