<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self pending()
 * @method static self canceled()
 * @method static self succeed()
 * @method static self failed()
 */
class OrderStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'pending' => 1,
            'canceled' => 2,
            'succeed' => 3,
            'failed' => 4,
        ];
    }
}
