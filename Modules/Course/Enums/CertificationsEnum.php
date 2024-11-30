<?php

namespace Modules\Course\Enums;

enum CertificationsEnum
{
    const YES = 1;
    const NO = 2;


    public static function availableTypes(): array
    {
        return [
            'Yes'=>  self::YES,
            'No' =>  self::NO
        ];
    }
}
