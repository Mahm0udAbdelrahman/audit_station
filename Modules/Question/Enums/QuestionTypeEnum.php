<?php

namespace Modules\Question\Enums;

enum QuestionTypeEnum: int
{
    case Single = 1;
    case Multiple = 2;

    public static function availableTypes(): array
    {
        return [
            self::Single->value,
            self::Multiple->value,
        ];
    }
}
