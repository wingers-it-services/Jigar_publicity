<?php

namespace App\Enums;


enum AccountStatusEnum
{
    const APPROVED = 1;
    const PENDING = 0;
    const BLOCKED = 2;

    public static function getLabel(int $value): ?string
    {
        return match ($value) {
            self::APPROVED => 'APPROVED',
            self::PENDING  => 'PENDING',
            self::BLOCKED  => 'BLOCKED',
            default        => 'PENDING',
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
