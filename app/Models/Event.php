<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'coach_id',
        'week_day_id',
        'package_id',
        'client_bought_package_id',
        'client_timezone_id',
        'status_id',
        'event_date',
        'start_at',
        'end_at',
        'deleted_at',
    ];
}
