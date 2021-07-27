<?php

namespace App\Contracts\Common\Models\Payment;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface PaymentableContract
{
    public function paymentable(): MorphMany;
}
