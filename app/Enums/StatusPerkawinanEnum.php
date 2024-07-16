<?php

namespace App\Enums;

enum StatusPerkawinanEnum: string
{
    case Menikah = 'Menikah';
    case Lajang = 'Lajang';

    public function R1(): float
    {
        return match ($this) {
            StatusPerkawinanEnum::Menikah => 0.62962963,
            StatusPerkawinanEnum::Lajang => 0.666666667,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            StatusPerkawinanEnum::Menikah => 0.37037037,
            StatusPerkawinanEnum::Lajang => 0.333333333,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Menikah' => self::Menikah,
            'Lajang' => self::Lajang,
            default => null,
        };
    }
}
