<?php

namespace Modules\Auth\Services;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LogoutService
{

  
    public function logout()
    {
        Auth::user()->tokens()->delete();
    }

}
