<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event_id' => $this->faker->numberBetween(1, Event::count()),
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'body' => $this->faker->paragraph(),
        ];
    }
}
