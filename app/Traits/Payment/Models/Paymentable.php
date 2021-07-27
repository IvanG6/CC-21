<?php

namespace App\Traits\Payment\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Paymentable
{
    public function paymentable(): MorphMany
    {
        return $this->morphMany(Payment::class, 'model');
    }
}
