<?php

namespace Modules\Auth\Http\Controllers;

use App\Helpers\ApiResource;
use Throwable;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialiteController extends Controller
{
    use HttpResponse;
   public function rediredct($provider)
   {
      return Socialite::driver($provider)->redirect();
   }

    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();

            $provider_user = User::where([
                'provider_name' => $provider,
                'provider_id' => $user->provider_id,
            ])->first();

            if (!$provider_user) {
                $provider_user = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Crypt::encrypt(Str::random(8)),
                    'provider_name' => $provider,
                    'provider_id' => $user->getId(),
                    'provider_token' => $user->tokens
                ]);
            }

            Auth::login($provider_user);
            return $this->okResponse(message: 'Login Successfully', data: $provider_user);
                } catch (Throwable $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], 400);
        }
    }


}
