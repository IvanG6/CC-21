<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self login()
 */
class CodeOperationEnum extends Enum
{
    // not required for int values
    // only for example
    protected static function values(): array
    {
        return [
            'login' => 1,
        ];
    }
}
