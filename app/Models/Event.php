<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'event_location',
        'event_description',
        'event_image',
        'event_date'
    ];

    protected $guarded = [];

    use HasFactory;
}
