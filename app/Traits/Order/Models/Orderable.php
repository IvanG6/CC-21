<?php

namespace App\Traits\Order\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Orderable
{
    public function orderable(): MorphMany
    {
        return $this->morphMany(Order::class, 'model');
    }
}
