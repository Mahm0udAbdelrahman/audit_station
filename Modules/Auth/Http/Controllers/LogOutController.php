<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Services\LogoutService;

class LogOutController extends Controller
{
    use HttpResponse;
    public $logout;
    public function __construct(LogoutService $logout)
    {
        $this->logout = $logout;
    }
    public function logout()
    {
        $this->logout->logout();
        return $this->okResponse(message: 'You have successfully logged out');

    }
}
