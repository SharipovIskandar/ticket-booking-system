<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TicketType;

class CreateTicketTypeCommand extends Command
{
    protected $signature = 'create:ticket-type {name} {price}';
    protected $description = 'Создать новый тип билета';

    public function handle()
    {
        $ticketType = TicketType::query()->create([
            'name' => $this->argument('name'),
            'price' => $this->argument('price'),
        ]);

        $this->info('Тип билета успешно создан: ' . $ticketType->name);
    }
}

