<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self admin()
 * @method static self coach()
 * @method static self student()
 */
class RoleEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'admin' => 'admin',
            'coach' => 'coach',
            'student' => 'student',
        ];
    }
}
