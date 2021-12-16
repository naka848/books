<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'checkout_date',
        'scheduled_return_date',
        'return_date',
    ];
}
