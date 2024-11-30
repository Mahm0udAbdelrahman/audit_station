<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\HttpResponse;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Modules\Auth\Enums\ErrorStatusEnum;
use Modules\Auth\Enums\OtpTypeEnum;
use Modules\Auth\Enums\UserStatusEnum;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Auth\Http\Requests\Dashboard\StoreRequest as DashboardStoreRequest;
use Modules\Auth\Http\Requests\Login\StoreRequest;
use Modules\Auth\Http\Requests\Token\RefreshTokenRequest;
use Modules\Auth\Models\OTP;
use Modules\Auth\Models\RefreshToken;
use Modules\Auth\Services\AuthService;
use Modules\Auth\Services\RefreshTokenService;
use Illuminate\Http\JsonResponse;
use Modules\Auth\Transformers\EmployeeResource;
use Modules\Auth\Transformers\RefreshTokenResource;

class AuthController extends Controller
{
    use HttpResponse;
    public $auth;
    public function __construct(AuthService $auth)
    {
        $this->auth = $auth;
    }
    public function loginDashboard(DashboardStoreRequest $request)
    {
        $validation = $request->validated();

        $data = $this->auth->loginDashboard($validation);
        return $this->okResponse(
            message: 'Login Successfully',
            data: [
                'token' => $data['token'],
                'admin' => new EmployeeResource($data['admin']),
            ]
        );
        }




    public function login(StoreRequest $request)
    {

        $validation = $request->validated();

        $user = User::where('email', $request->email)->whereNotIn('type', [UserTypeEnum::ADMIN, UserTypeEnum::ADMIN_EMPLOYEE])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->errorResponse(code: 401 ,message: 'User data does not match', data: [
                'User data does not match' => ErrorStatusEnum::NotMatch,
            ]);
        }

        if (OTP::where('user_id', $user->id)->where('type',OtpTypeEnum::Register)->exists()) {
            return $this->errorResponse(code: 401, message: 'Account Not Successfully', data: [
                'Account Not Successfully' => ErrorStatusEnum::AccountNotSuccessfully,
            ]);
        }

        // if (is_null($user->email_verified_at)) {
        //     throw new Exception('User is not verified', 403);
        // }

        if ($user->status == UserStatusEnum::Inactive) {
            return $this->errorResponse(message: 'Account is not activated', data: [
                'Account is not activated' => ErrorStatusEnum::AccountNotActivated,
            ]);
        }

        $token = $user->createToken('token');
        $token->accessToken->expires_at = now()->addMinutes(15);
        $token->accessToken->save();

        return $this->okResponse(message: 'Login Successfully', data: [
            'email' => $user->email,
            'token' => $token->plainTextToken,
        ]);
    }



    public function refreshToken(RefreshTokenRequest $request, RefreshTokenService $refreshTokenService): JsonResponse
    {
        $refreshToken = RefreshToken::query()
            ->where('token', $refreshTokenService->getEncryptedToken($request->token))
            ->firstOrFail();

        $refreshTokenService->assertExpired($refreshToken);
        $user = $refreshToken->user;
        $this->login($user);

        return $this->resourceResponse(RefreshTokenResource::make($user->token));
    }


}
