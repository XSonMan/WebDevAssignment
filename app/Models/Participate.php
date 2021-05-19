<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'event_id'
    ];

    protected $guarded = [];

    use HasFactory;
}
