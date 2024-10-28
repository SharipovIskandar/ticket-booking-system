<?php

namespace Database\Factories;

use App\Models\TicketType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketTypeFactory extends Factory
{
    protected $model = TicketType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(10000, 500000),
            'available_amount' => $this->faker->numberBetween(1, 50),
        ];
    }
}
