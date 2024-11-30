<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Http\Requests\Token\RefreshTokenRequest;
use Modules\Auth\Services\RefreshTokenService;
use Modules\Auth\Transformers\RefreshTokenResource;

class RefreshTokenController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly RefreshTokenService $refreshTokenService) {}

    public function rotate(RefreshTokenRequest $request)
    {
        
        $token = $this->refreshTokenService->rotate($request->validated());

        return $this->okResponse(RefreshTokenResource::make($token));
    }
}
