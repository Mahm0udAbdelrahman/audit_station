<?php

namespace Modules\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Emails\ForgetOtpEmail;
use Modules\Auth\Models\OTP;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Enums\OtpTypeEnum;

class PasswordService
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function forgotPassword($data)
    {
        $user = $this->model->where('email', $data['email'])->first();

        if ($user) {

            $lastOtp = OTP::where('email', $data['email'])->where('type', OtpTypeEnum::ForgetPassword)->first();

            if ($lastOtp && now()->lessThan($lastOtp->expire_at)) {
                throw ValidationException::withMessages([
                    'data' => ['You need to wait before requesting a new OTP.'],
                ])->status(429);

            }

            $otp = rand(1000, 9999);
          $forget =  OTP::create([
                'user_id' => $user->id,
                'email' => $data['email'],
                'otp' => $otp,
                'type' => OtpTypeEnum::ForgetPassword,
                'expire_at' => now()->addMinutes(1)
            ]);
             Mail::to($data['email'])->send(new ForgetOtpEmail($otp));
            return $forget;
        }

        return false;
    }


    public function resetPassword($data)
    {
        $otp = $data['otp'];
        $otpData = OTP::where('otp', $otp)->where('type',OtpTypeEnum::ForgetPassword)->first();
        if ($otpData) {
            $user = $this->model->where('id', $otpData->user_id)->first();
            $user->update(['password' => Hash::make($data['password'])]);
            $otpData->delete();
            return true;
        }
        return false;
    }

    public function changePassword($data, &$message = null)
    {
        $user = $this->model->where('id', Auth::user()->id)->first();

        if ($user && Hash::check($data['current_password'], $user->password)) {
            $user->update(['password' => Hash::make($data['password'])]);

            return true;
        }

        return false;
    }
}
