<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachSchedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'coach_id',
        'week_day_id',
        'start_at',
        'end_at',
    ];
}
