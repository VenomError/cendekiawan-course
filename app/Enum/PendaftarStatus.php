<?php

namespace App\Enum;

enum PendaftarStatus: string
{
    case ACTIVE = 'active';
    case CANCEL = 'cancel';


    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
