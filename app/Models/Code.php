<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Code extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'model_id',
        'model_type',
        'valid_to',
        'code',
        'operation',
        'is_active',
        'deleted_at',
    ];
}
