<?php

namespace App\Enums;

enum PinjamanSebelumnyaEnum: string
{
    case Lancar = 'Lancar';
    case Macet = 'Macet';

    public function R1(): float
    {
        return match ($this) {
            PinjamanSebelumnyaEnum::Lancar => 0.695652174,
            PinjamanSebelumnyaEnum::Macet => 0.428571429,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            PinjamanSebelumnyaEnum::Lancar => 0.304347826,
            PinjamanSebelumnyaEnum::Macet => 0.571428571,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Lancar' => self::Lancar,
            'Macet' => self::Macet,
            default => null,
        };
    }
}
