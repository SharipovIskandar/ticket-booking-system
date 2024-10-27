<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_ticket_types_table()
    {
        $this->assertTrue(Schema::hasTable('ticket_types'));
        $this->assertTrue(Schema::hasColumns('ticket_types', [
            'id', 'name', 'price', 'created_at', 'updated_at'
        ]));
    }


    /** @test */
    public function it_creates_tickets_table()
    {
        $this->assertTrue(Schema::hasTable('tickets'));
        $this->assertTrue(Schema::hasColumns('tickets', [
            'id', 'order_id', 'ticket_type_id', 'barcode',
            'created_at', 'updated_at'
        ]));
    }
}
