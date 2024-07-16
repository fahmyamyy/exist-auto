<?php

namespace App\Enums;

enum StatusKelayakanEnum: string
{
    public static function R1(): float
    {
        return 0.633333333;
    }

    public static function R2(): float
    {
        return 0.366666667;
    }
}   
