<?php

namespace Modules\Course\Enums;

enum SkillLevelEnum
{
    const Beginner = 1;
    const Intermediate = 2;
    const Expert = 3;

    public static function availableTypes(): array
    {
        return [
            'Beginner'=>  self::Beginner,
            'Intermediate' =>  self::Intermediate,
            'Expert' =>  self::Expert,
        ];
    }
}
