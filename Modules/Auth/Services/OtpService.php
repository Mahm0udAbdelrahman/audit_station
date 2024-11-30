<?php

namespace Modules\Auth\Services;

use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Emails\ForgetOtpEmail;
use Modules\Auth\Enums\OtpTypeEnum;
use Modules\Auth\Models\OTP;

class OtpService
{
    use HttpResponse;
    public $otp;

    public function __construct(OTP $otp)
    {
        $this->otp = $otp;
    }

    public function otp($data)
    {

        $otp = $this->otp->where('otp', $data['otp'])->where('email', $data['email'])->first();
        if ($otp) {
            $otp->delete();
            return true;
        }
        return $otp;
    }

    public function verifyOtp($data)
    {
        $OTP = $this->otp->where('email', $data['email'])->first();

        if ($OTP) {
            if (now()->lessThan($OTP->expire_at)) {
                throw ValidationException::withMessages([
                    'data' => ['You need to wait before requesting a new OTP.'],
                ])->status(429);

            }

            $OTP->update([
                'otp' => rand(1000, 9999),
                'expire_at' => now()->addMinutes(1),
                'type' => OtpTypeEnum::VerifyOtp,
            ]);

            Mail::to($data['email'])->send(new ForgetOtpEmail($OTP['otp']));
        }

        return $OTP;
    }

}
