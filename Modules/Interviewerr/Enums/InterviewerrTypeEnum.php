<?php

namespace Modules\Interviewerr\Enums;

class InterviewerrTypeEnum
{
    public const Accepte = 1;
    public const Rejected = 0;

    public static function getLabel($type)
    {
        $types = [
            self::Accepte => 'Accepted',
            self::Rejected => 'Rejected',

        ];

        return $types[$type] ?? 'Unknown';
    }
}
