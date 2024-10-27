<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TicketType;

class CreateTicketTypeCommand extends Command
{
    protected $signature = 'create:ticket-type {name} {price} {description?}';
    protected $description = 'Создать новый тип билета';

    public function handle()
    {
        $ticketType = TicketType::create([
            'name' => $this->argument('name'),
            'price' => $this->argument('price'),
            'description' => $this->argument('description'),
        ]);

        $this->info('Тип билета успешно создан: ' . $ticketType->name);
    }
}
