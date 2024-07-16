<?php

namespace App\Enums;

enum StatusPinjamanEnum: string
{
    case Baru = 'Baru';
    case PernahPinjam = 'Pernah Pinjam';

    public function R1(): float
    {
        return match ($this) {
            StatusPinjamanEnum::Baru => 0.625,
            StatusPinjamanEnum::PernahPinjam => 0.642857143,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            StatusPinjamanEnum::Baru => 0.375,
            StatusPinjamanEnum::PernahPinjam => 0.357142857,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Baru' => self::Baru,
            'Pernah Pinjam' => self::PernahPinjam,
            default => null,
        };
    }
}
