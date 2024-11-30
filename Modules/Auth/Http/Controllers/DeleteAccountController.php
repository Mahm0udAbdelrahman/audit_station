<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Enums\ErrorStatusEnum;
use Modules\Auth\Http\Requests\Password\DeleteAccountRequest;
use Modules\Auth\Services\DeleteAccountService;

class DeleteAccountController extends Controller
{

    use HttpResponse;
    public $delete_account;
    public function __construct(DeleteAccountService $delete_account)
    {
        $this->delete_account = $delete_account;
    }
    public function deleteAccount(DeleteAccountRequest $request)
    {
        try {
            $deleted = $this->delete_account->deleteAccount($request->validated());

            if ($deleted) {
                return $this->okResponse(message: 'Account has been deleted successfully');
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
