<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'message_id',
        'model_from_id',
        'model_from_type_id',
        'name',
        'path',
        'extension',
    ];
}
