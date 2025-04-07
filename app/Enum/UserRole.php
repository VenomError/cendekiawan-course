<?php

namespace App\Enum;

enum UserRole: string
{
    case PESERTA = "peserta";
    case ADMIN = "admin";
    case PIMPINAN = "pimpinan";

    public static function values(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
}
