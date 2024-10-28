<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;

class CreateEventCommand extends Command
{
    protected $signature = 'create:event {name} {date} {ticket_count} {description?} {location?}';
    protected $description = 'Создать новое событие';

    public function handle()
    {
        $event = Event::create([
            'name' => $this->argument('name'),
            'date' => $this->argument('date'),
            'ticket_count' => $this->argument('ticket_count'),
            'description' => $this->argument('description'),
            'location' => $this->argument('location'),
        ]);

        $this->info('Событие успешно создано: ' . $event->name);
    }
}
