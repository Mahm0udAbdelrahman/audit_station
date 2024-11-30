<?php

namespace Modules\Auth\Enums;


class OtpTypeEnum
{
    public const Register = 1;
    public const ForgetPassword = 2;
    public const VerifyOtp = 3;


    public static function getLabel($type)
    {
        $types = [
            self::Register => 'Register',
            self::ForgetPassword => 'Forget Password',
            self::VerifyOtp => 'Verify Otp',
        ];

        return $types[$type] ?? 'Unknown';
    }


}
