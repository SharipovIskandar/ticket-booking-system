<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketType;

class TicketTypeSeeder extends Seeder
{
    public function run()
    {
        TicketType::factory()->count(5)->create();
    }
}
