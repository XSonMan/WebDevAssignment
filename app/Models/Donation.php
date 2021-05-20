<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'amount',
        'proof',
        'event_id',
    ];

    protected $guarded = [];

    use HasFactory;
}
