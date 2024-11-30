<?php

namespace Modules\Upgrade\Enums;

class TypeEnum
{
    public const Waitting = 0;
    public const Approved = 1;
    public const Rejected = 2;

    public static function getLabel($type)
    {
        $types = [
            self::Waitting => 'Waitting',
            self::Rejected => 'Rejected',
            self::Approved => 'Approved',
        ];

        return $types[$type] ?? 'Unknown';
    }
}
