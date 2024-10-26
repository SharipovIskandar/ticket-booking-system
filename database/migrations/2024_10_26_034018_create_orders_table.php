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
            $table->unsignedBigInteger('event_id');
            $table->date('event_date');
            $table->decimal('ticket_adult_price', 8, 2);
            $table->integer('ticket_adult_quantity');
            $table->decimal('ticket_kid_price', 8, 2);
            $table->integer('ticket_kid_quantity');
            $table->string('barcode')->unique();
            $table->decimal('equal_price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

