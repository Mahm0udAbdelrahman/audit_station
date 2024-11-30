<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Enums\ErrorStatusEnum;
use Modules\Auth\Http\Requests\Password\ForgetPasswordRequest;
use Modules\Auth\Http\Requests\Register\OTPRequest;
use Modules\Auth\Services\OtpService;

class OTPController extends Controller
{
    use HttpResponse;
    public $otp;
  public function __construct(OtpService $otp)
  {
      $this->otp = $otp;
  }
  public function otp(OTPRequest $request)
  {

      $validation = $request->validated();
      $data = $this->otp->otp($validation);

      return $this->okResponse(message: 'Register Successfully' , data: [
          'Register Successfully' => ErrorStatusEnum::AccountSuccessfully
      ]);
  }


  public function verifyOtp(ForgetPasswordRequest $request)
  {
      $validation = $request->validated();
      $data = $this->otp->verifyOtp($validation);
       return $this->okResponse(message: 'Email Verification Has Been Sent Successfully');
  }
}
