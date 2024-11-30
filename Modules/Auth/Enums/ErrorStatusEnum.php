<?php

namespace Modules\Auth\Enums;

use phpseclib3\File\ASN1\Maps\Certificate;

class ErrorStatusEnum
{
    public const NotMatch = 1;
    public const AccountNotSuccessfully = 2;
    public const AccountSuccessfully = 3;
    public const AccountNotActivated = 4;
    public const InvalidInput = 5;
    public const DeleteAcount = 6;
    public const OTPNotFound = 7;
    public const Unauthorized = 8;
    public const IncorrectNotPassword = 9;


    public static function getLabel($type)
    {
        $types = [
            self::NotMatch => 'NotMatch',
            self::AccountNotSuccessfully => 'Account Not Successfully',
            self::AccountSuccessfully => 'Account  Successfully',
            self::AccountNotActivated => 'Account is not activated',
            self::InvalidInput => 'Invalid input',
            self::DeleteAcount => 'Delete Account',
            self::OTPNotFound => 'OTP not found',
            self::Unauthorized => 'Unauthorized',
            self::IncorrectNotPassword => 'Incorrect Not Password',
        ];

        return $types[$type] ?? 'Unknown';
    }


}
