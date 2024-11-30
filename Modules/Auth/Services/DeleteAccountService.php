<?php

namespace Modules\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DeleteAccountService
{

    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }


    public function deleteAccount($data)
    {
        $user = $this->model->where('id', Auth::user()->id)->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            $user->tokens()->delete();
            $user->delete();
            return true;
        }

        return false;
    }
}
