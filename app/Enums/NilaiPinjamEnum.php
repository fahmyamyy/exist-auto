<?php

namespace App\Enums;

enum NilaiPinjamEnum: string
{
    case A = '<70';
    case B = '70-150';
    case C = '>150';

    public function R1(): float
    {
        return match ($this) {
            NilaiPinjamEnum::A => 0.882352941,
            NilaiPinjamEnum::B => 0.272727273,
            NilaiPinjamEnum::C => 0.5,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            NilaiPinjamEnum::A => 0.117647059,
            NilaiPinjamEnum::B => 0.727272727,
            NilaiPinjamEnum::C => 0.5,
        };
    }

    public static function search(float $nilai): ?self
    {
        return match (true) {
            $nilai < 70 => self::A,
            $nilai >= 70 && $nilai <= 150 => self::B,
            $nilai > 150 => self::C,
            default => null,
        };
    }
}
