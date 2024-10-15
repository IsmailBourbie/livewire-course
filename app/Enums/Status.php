<?php

namespace App\Enums;

enum Status: string
{
    case Paid = 'paid';
    case Pending = 'pending';
    case Failed = 'failed';
    case Refunded = 'refunded';

    public function label(): string
    {
        return match ($this) {
            Status::Paid => 'Paid',
            Status::Pending => 'Pending',
            Status::Failed => 'Failed',
            Status::Refunded => 'Refunded',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            Status::Paid => 'icons.check',
            Status::Pending => 'icons.clock',
            Status::Failed => 'icons.x-mark',
            Status::Refunded => 'icons.arrow-uturn-left',
        };
    }

    public function color(): string
    {
        return match ($this) {
            Status::Paid => 'green',
            Status::Pending => 'gray',
            Status::Failed => 'red',
            Status::Refunded => 'purple',
        };
    }
}

