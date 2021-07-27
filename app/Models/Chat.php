<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'client_id',
    ];

    /**
     * @return HasOne
     */
    public function coach(): HasOne
    {
        return $this->hasOne(Coach::class, 'coach_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(User::class, 'client_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'id');
    }
}
