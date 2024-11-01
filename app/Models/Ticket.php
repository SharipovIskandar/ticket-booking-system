<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'ticket_type_id',
        'is_used',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }
    public function barcode()
    {
        return $this->belongsTo(TicketBarcode::class, 'barcode_id');
    }
}
