<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'location' => $this->faker->address,
            'ticket_count' => $this->faker->numberBetween(10, 100),
        ];
    }
}
