<?php

namespace Modules\Upgrade\Enums;

class StatusOrderEnum
{


    public const UNACTIVE = 0;
    public const ACTIVE = 1;

    public static function getLabel($type)
    {
        $types = [
            self::UNACTIVE => 'unActive',
            self::ACTIVE => 'Active',
        ];

        return $types[$type] ?? 'Unknown';
    }



}
