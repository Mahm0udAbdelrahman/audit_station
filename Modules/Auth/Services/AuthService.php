<?php

namespace Modules\Auth\Services;

use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Enums\ErrorStatusEnum;
use Modules\Auth\Enums\UserTypeEnum;

class AuthService
{
    use HttpResponse;
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function loginDashboard($data)
    {

        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            throw ValidationException::withMessages([
                'data' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user = $this->model->where('email', $data['email'])->whereIn('type', [UserTypeEnum::ADMIN, UserTypeEnum::ADMIN_EMPLOYEE])->first();

        if (!$user) {
            throw ValidationException::withMessages([
                // 'data' => ['Unauthorized'],
                'Unauthorized' => ErrorStatusEnum::Unauthorized,
            ]);

        }

        $user->tokens()->delete();
        $token = $user->createToken('auth', [], now()->addHour());

        return [
            'token' => $token->plainTextToken,
            'admin' => $user,
        ];
    }

}
