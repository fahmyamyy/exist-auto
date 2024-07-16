<?php

namespace App\Enums;

enum PengahasilanEnum: string
{
    case A = '<5';
    case B = '5-12';
    case C = '>12';

    public function R1(): float
    {
        return match ($this) {
            PengahasilanEnum::A => 0.470588235,
            PengahasilanEnum::B => 0.571428571,
            PengahasilanEnum::C => 0.375,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            PengahasilanEnum::A => 0.294117647,
            PengahasilanEnum::B => 0.285714286,
            PengahasilanEnum::C => 0.25,
        };
    }

    public static function search(float $penghasilan): ?self
    {
        return match (true) {
            $penghasilan < 5 => self::A,
            $penghasilan >= 5 && $penghasilan <= 12 => self::B,
            $penghasilan > 12 => self::C,
            default => null,
        };
    }
}
