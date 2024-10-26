<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('event_id');
            $table->dateTime('event_date');
            $table->unsignedInteger('ticket_adult_price');
            $table->unsignedInteger('ticket_adult_quantity');
            $table->unsignedInteger('ticket_kid_price');
            $table->unsignedInteger('ticket_kid_quantity');
            $table->string('barcode')->unique();
            $table->unsignedInteger('equal_price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
