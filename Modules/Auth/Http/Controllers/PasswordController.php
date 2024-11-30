<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Enums\ErrorStatusEnum;
use Modules\Auth\Http\Requests\Password\ChangePasswordRequest;
use Modules\Auth\Http\Requests\Password\ForgetPasswordRequest;
use Modules\Auth\Http\Requests\Password\ResetPasswordRequest;
use Modules\Auth\Services\PasswordService;

class PasswordController extends Controller
{
    use HttpResponse;
    public $password;
    public function __construct(PasswordService $password)
    {
        $this->password = $password;
    }

    public function forgotPassword(ForgetPasswordRequest $request)
    {
        $data = $this->password->forgotPassword($request->validated());
        return $this->okResponse(message: 'The verification code has been successfully sent to your email');

    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $password =  $this->password->resetPassword($request->validated());
         return $this->okResponse(message: 'The password has been changed successfully');

     }


    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $deleted = $this->password->changePassword($request->validated());

            if ($deleted) {
                return $this->okResponse(message: 'The password has been changed successfully');
            } else {

                return $this->errorResponse(message: 'Invalid password', data: [
                    'Invalid password' => ErrorStatusEnum::IncorrectNotPassword
                ]);
            }


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => $e->errors()['current_password'][0]], 422);
        }
    }
}
