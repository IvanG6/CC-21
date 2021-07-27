<?php

namespace App\Traits\Common\Models\Code;

use App\Models\Code;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Codeable
{
    public function codeable(): MorphMany
    {
        return $this->morphMany(Code::class, 'model');
    }
}
