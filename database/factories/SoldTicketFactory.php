<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldTicket>
 */
class SoldTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'ticket_id' => $this->faker->unique()->numberBetween(1, Ticket::count()),
            'sold_at' => $this->faker->dateTime,
            'valid_till' => $this->faker->dateTime,
        ];
    }
}
