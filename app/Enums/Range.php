<?php

namespace App\Enums;
use Illuminate\Support\Carbon;

enum Range: string
{
    case All_Time = 'all';
    case Year = 'year';
    case Last_30 = 'last30';
    case Last_7 = 'last7';
    case Today = 'today';
    case Custom = 'custom';

    public function label($start = null, $end = null): string
    {
        return match ($this) {
            Range::All_Time => 'All Time',
            Range::Year => 'This Year',
            Range::Last_30 => 'Last 30 Days',
            Range::Last_7 => 'Last 7 Days',
            Range::Today => 'Today',
            Range::Custom => ($start !== null && $end !== null)
                ? str($start)->replace('-', '/') . ' - ' . str($end)->replace('-', '/')
                : 'Custom Range',
        };
    }

    public function dates()
    {
        return match ($this) {
            Range::Today => [Carbon::today(), now()],
            Range::Last_7 => [Carbon::today()->subDays(6), now()],
            Range::Last_30 => [Carbon::today()->subDays(29), now()],
            Range::Year => [Carbon::now()->startOfYear(), now()],
        };
    }
}
