<?php

namespace Modules\Upgrade\Enums;

class TargetTypeEnum
{
    public const ADMIN = 0;
    public const NORMAL_USER = 1;
    public const INSTRUCTOR = 2;
    public const COMPANY = 3;
    public const ACCOUNTANT = 4;
    public const INTERVIEWER = 5;
    public const CERTIFIED = 6;

    public static function getLabel($type)
    {
        $types = [
            self::ADMIN => 'Admin',
            self::NORMAL_USER => 'Normal User',
            self::INSTRUCTOR => 'Instructor',
            self::COMPANY => 'Company',
            self::ACCOUNTANT => 'Accountant',
            self::INTERVIEWER => 'Interviewer',
            self::CERTIFIED => 'Certified',
        ];

        return $types[$type] ?? 'Unknown';
    }


    public static function getValue($label)
    {
        $labels = [
            'admin' => self::ADMIN,
            'normal_user' => self::NORMAL_USER,
            'instructor' => self::INSTRUCTOR,
            'company' => self::COMPANY,
            'accountant' => self::ACCOUNTANT,
            'certified' => self::CERTIFIED,
            'interviewer' => self::INTERVIEWER,
            'Accountant' => self::ACCOUNTANT,
        ];

        return $labels[strtolower($label)] ?? null;
    }
}
