<?php

namespace Modules\Upgrade\Enums;


class ExamEnum
{

    public const FALSE = 0;
    public const TRUE = 1;


    public static function getLabel($type){

        $types = [

            self::FALSE => 'false',
            self::TRUE => 'true'
        ];

        return $types[$type] ?? 'Unknown';
    }

}
