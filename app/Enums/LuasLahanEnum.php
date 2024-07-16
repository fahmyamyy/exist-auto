<?php

namespace App\Enums;

enum LuasLahanEnum: string
{
    case A = '<3';
    case B = '3-5';
    case C = '>5';

    public function R1(): float
    {
        return match ($this) {
            LuasLahanEnum::A => 0.533333333,
            LuasLahanEnum::B => 0.7,
            LuasLahanEnum::C => 0.8,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            LuasLahanEnum::A => 0.466666667,
            LuasLahanEnum::B => 0.3,
            LuasLahanEnum::C => 0.2,
        };
    }

    public static function search(float $luas): ?self
    {
        return match (true) {
            $luas < 3 => self::A,
            $luas >= 3 && $luas <= 5 => self::B,
            $luas > 5 => self::C,
            default => null,
        };
    }
}
