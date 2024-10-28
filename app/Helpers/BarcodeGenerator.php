<?php

namespace App\Helpers;

class BarcodeGenerator
{
    public static function generateBarcode()
    {
        return uniqid('ticket_');
    }
}
