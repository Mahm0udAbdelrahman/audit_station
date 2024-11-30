<?php

namespace App\Helpers;

use Modules\Auth\Enums\UserTypeEnum;
class GeneralHelper
{
    public static function adminMiddlewares(): array
    {
        return array_merge(self::getDefaultLoggedUserMiddlewares(), ['user_type_in:' . UserTypeEnum::ADMIN . '|' . UserTypeEnum::ADMIN_EMPLOYEE]);
    }

    public static function getDefaultLoggedUserMiddlewares(string $permissions = null): array
    {
        $permissions = $permissions ? 'permission:' . $permissions : null;

        $middlewares = [
            'auth:sanctum',
        ];

        if ($permissions) {
            $middlewares[] = $permissions;
        }

        return $middlewares;
    }

    public static function authMiddleware(): string
    {
        return 'auth:sanctum';
    }
}
