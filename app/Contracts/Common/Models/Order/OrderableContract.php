<?php

namespace App\Contracts\Common\Models\Order;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface OrderableContract
{
    public function orderable(): MorphMany;
}
