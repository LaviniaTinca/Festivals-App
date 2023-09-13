<?php

namespace Database\Factories;

use App\Models\Festival;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'festival_id' => $this->faker->numberBetween(1, Festival::count()),
            'price' => $this->faker->numberBetween(1, 2000)
        ];
    }
}
