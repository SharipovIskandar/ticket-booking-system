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
    public function it_creates_orders_table()
    {
        $this->assertTrue(Schema::hasTable('orders'));
        $this->assertTrue(Schema::hasColumns('orders', [
            'id', 'event_id', 'event_date', 'ticket_adult_price',
            'ticket_adult_quantity', 'ticket_kid_price',
            'ticket_kid_quantity', 'barcode', 'equal_price',
            'created_at', 'updated_at'
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
