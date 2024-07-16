<?php

namespace App\Enums;

enum JenisPembayaranEnum: string
{
    case Angsuran = 'Angsuran';
    case Potongan = 'Potongan';

    public function R1(): float
    {
        return match ($this) {
            JenisPembayaranEnum::Angsuran => 0.733333333,
            JenisPembayaranEnum::Potongan => 0.533333333,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            JenisPembayaranEnum::Angsuran => 0.266666667,
            JenisPembayaranEnum::Potongan => 0.466666667,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Angsuran' => self::Angsuran,
            'Potongan' => self::Potongan,
            default => null,
        };
    }
}
