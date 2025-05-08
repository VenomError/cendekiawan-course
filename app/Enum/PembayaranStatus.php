<?php

namespace App\Enum;

enum PembayaranStatus: string
{
    case PENDING = "pending";
    case SUCCESS = "success";
    case FAILED = "failed";
    case CANCEL = "cancel";


    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
