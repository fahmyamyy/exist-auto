<?php

namespace App\Enums;

enum JangkaWaktuEnum: string
{
    case A = '<5';
    case B = '5-8';
    case C = '>8';

    public function R1(): float
    {
        return match ($this) {
            JangkaWaktuEnum::A => 0.444444444,
            JangkaWaktuEnum::B => 0.764705882,
            JangkaWaktuEnum::C => 0.5,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            JangkaWaktuEnum::A => 0.555555556,
            JangkaWaktuEnum::B => 0.235294118,
            JangkaWaktuEnum::C => 0.5,
        };
    }

    public static function search(float $waktu): ?self
    {
        return match (true) {
            $waktu < 5 => self::A,
            $waktu >= 5 && $waktu <= 8 => self::B,
            $waktu > 12 => self::C,
            default => null,
        };
    }
}
