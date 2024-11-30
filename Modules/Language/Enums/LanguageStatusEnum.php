<?php

namespace Modules\Language\Enums;

enum LanguageStatusEnum: int
{
    case active = 1;
    case inactive = 2;

    public static function availableTypes(): array
    {
        return [
            'active'=>  self::active->value,
            'inactive' =>  self::inactive->value,
        ];
    }
}
