<?php

namespace App\Enums;

enum Country: string
{

    case Algeria = 'DZ';
    case United_Kingdom = 'GB';
    case Spain = 'ES';
    case Palestine = 'PS';
    case Tunisia = 'TN';
    case Germany = 'DE';
    case  United_States = 'US';

    public function label(): string
    {
        return match ($this) {
            self::Algeria => __('Algeria'),
            self::United_Kingdom => __('United Kingdom'),
            self::Spain => __('Spain'),
            self::Palestine => __('Palestine'),
            self::Tunisia => __('Tunisia'),
            self::Germany => __('Germany'),
            self::United_States => __('United States'),
        };
    }
}
