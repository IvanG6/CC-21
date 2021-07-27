<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachBlockedDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'blocked_date',
        'start_at',
        'end_at',
    ];
}
