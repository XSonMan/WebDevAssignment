<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donlist extends Model
{

    protected $fillable = [
        'user_id',
        'event_name',
        'amount',
        'proof',
        'created_at'
    ];

    protected $guarded = [];

    use HasFactory;
}
