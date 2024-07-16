<?php

namespace App\Enums;

enum UsiaEnum: string
{
    case A = '<31';
    case B = '31-50';
    case C = '>50';

    public function R1(): float
    {
        return match ($this) {
            UsiaEnum::A => 0.6,
            UsiaEnum::B => 0.5,
            UsiaEnum::C => 0.733333333,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            UsiaEnum::A => 0.4,
            UsiaEnum::B => 0.5,
            UsiaEnum::C => 0.266666667,
        };
    }

    public static function search(int $umur): ?self
    {
        return match (true) {
            $umur < 31 => self::A,
            $umur >= 31 && $umur <= 50 => self::B,
            $umur > 50 => self::C,
            default => null,
        };
    }
}
