<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

