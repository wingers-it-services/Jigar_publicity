<?php

namespace App\Enums;


enum AccountStatusEnum: int
{
    case APPROVED = 1;
    case PENDING = 0;
    case BLOCKED = 2;

    public static function getLabel(int $value): ?string
    {
        return match ($value) {
            self::APPROVED->value => 'APPROVED',
            self::PENDING->value => 'PENDING',
            self::BLOCKED->value => 'BLOCKED',
            default => 'PENDING',
        };
    }

    public static function getValues()
    {
        return [
            (object) ['value' => self::APPROVED, 'label' => 'APPROVED'],
            (object) ['value' => self::PENDING, 'label' => 'PENDING'],
            (object) ['value' => self::BLOCKED, 'label' => 'BLOCKED']
        ];
    }
}
