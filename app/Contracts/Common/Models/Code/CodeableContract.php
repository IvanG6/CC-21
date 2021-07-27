<?php

namespace App\Contracts\Common\Models\Code;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface CodeableContract
{
    public function codeable(): MorphMany;
}
