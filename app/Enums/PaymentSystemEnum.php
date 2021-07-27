<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self paypal()
 * @method static self stripe()
 */
class PaymentSystemEnum extends Enum
{
    /**
     * Using sample: where(name, =, PaymentSystemEnum::paypal())
     * @return string[]
     */
    protected static function values(): array
    {
        return [
            'paypal' => 'paypal',
            'stripe' => 'stripe',
        ];
    }
}
