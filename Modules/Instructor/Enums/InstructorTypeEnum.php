<?php

namespace Modules\Instructor\Enums;

class InstructorTypeEnum
{
    public const ADMIN = 0;
    public const NORMAL_USER = 1;
    public const INSTRUCTOR = 2;
    public const COMPANY = 3;
    public const ACCOUNTANT = 4;
    public const INTERVIEWER = 5;
    public const ADMIN_EMPLOYEE = 6;

    public static function getLabel($type)
    {
        $types = [
            self::ADMIN => 'Admin',
            self::NORMAL_USER => 'Normal User',
            self::INSTRUCTOR => 'Instructor',
            self::COMPANY => 'Company',
            self::ACCOUNTANT => 'Accountant',
            self::INTERVIEWER => 'Interviewer',
            self::ADMIN_EMPLOYEE => 'AdminEmployee',
        ];

        return $types[$type] ?? 'Unknown';  
    }


    public static function isInstructor($type): bool
    {
        return $type === self::INSTRUCTOR;
    }
}
