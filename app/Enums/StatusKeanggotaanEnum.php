<?php

namespace App\Enums;

enum StatusKeanggotaanEnum: string
{
    case Pengurus = 'Pengurus';
    case Pengawas = 'Pengawas';
    case Anggota = 'Anggota';

    public function R1(): float
    {
        return match ($this) {
            StatusKeanggotaanEnum::Pengurus => 0.75,
            StatusKeanggotaanEnum::Pengawas => 0.666666667,
            StatusKeanggotaanEnum::Anggota => 0.608695652,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            StatusKeanggotaanEnum::Pengurus => 0.25,
            StatusKeanggotaanEnum::Pengawas => 0.333333333,
            StatusKeanggotaanEnum::Anggota => 0.391304348,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Pengurus' => self::Pengurus,
            'Pengawas' => self::Pengawas,
            'Anggota' => self::Anggota,
            default => null,
        };
    }
}
