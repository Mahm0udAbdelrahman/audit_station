<?php

namespace Modules\Subscription\Enums;

enum SubscriptionStatusEnum: int
{
    case UnActive = 0;
    case Active = 1;

    public static function availableTypes(): array
    {
        return [
            self::Active->value,
            self::UnActive->value,
        ];
    }
}
