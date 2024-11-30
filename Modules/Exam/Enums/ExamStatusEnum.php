<?php

namespace Modules\Exam\Enums;

enum ExamStatusEnum: int
{
    case UnActive = 0;
    case Active = 1;

    public static function availableStatus(): array
    {
        return [
            self::Active->value,
            self::UnActive->value,

        ];
    }
}
