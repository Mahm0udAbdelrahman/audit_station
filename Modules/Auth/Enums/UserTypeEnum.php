<?php

namespace Modules\Auth\Enums;

use phpseclib3\File\ASN1\Maps\Certificate;

class UserTypeEnum
{
    public const ADMIN = 1;
    public const NORMAL_USER = 2;
    public const INSTRUCTOR = 3;
    public const COMPANY = 4;
    public const ACCOUNTANT = 5;
    public const INTERVIEWER = 6;
    public const CERTIFIED = 7;
   public const ADMIN_EMPLOYEE = 8;

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
            self::ADMIN_EMPLOYEE => 'admin_employee',
        ];

        return $types[$type] ?? 'Unknown';
    }

    public static function alphaTypes(): array
    {
        return [
            self::ADMIN => 'admin',
            self::NORMAL_USER => 'user',
            self::INSTRUCTOR => 'instructor',
            self::COMPANY => 'company',
            self::ACCOUNTANT => 'accountant',
            self::INTERVIEWER => 'interviewer',
            self::CERTIFIED => 'certified',
            self::ADMIN_EMPLOYEE => 'admin_employee',
        ];
    }
}
