<?php

namespace Modules\PaymentMethod\Enums;

enum PaymentMethodStatusEnum: int
{
    case Inactive = 0;
    case Active = 1;

    public static function availableTypes(): array
    {
        return [
            self::Active->value,
            self::Inactive->value,
        ];
    }
}
