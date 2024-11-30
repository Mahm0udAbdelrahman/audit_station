<?php

namespace Modules\Auth\Http\Controllers;


use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Enums\ErrorStatusEnum;
use Modules\Auth\Http\Requests\Password\ForgetPasswordRequest;
use Modules\Auth\Http\Requests\Register\OTPRequest;
use Modules\Auth\Services\RegisterService;
use Modules\Auth\Http\Requests\Register\StoreRequest;
use Modules\Auth\Http\Requests\Register\UpdateRequest;
use Modules\Auth\Transformers\OtpResource;
use Modules\Auth\Transformers\ProfileResource;
use Modules\Auth\Transformers\RegisterResource;
use Modules\Auth\Transformers\verifyOtpResource;

class RegisterController extends Controller
{
    use HttpResponse;
    public $register;
  public function __construct(RegisterService $register)
  {
      $this->register = $register;
  }

    public function index()
    {

        $data = $this->register->index();
        return $this->paginatedResponse($data, RegisterResource::class);
     }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->register->store($validation);
        return $this->okResponse(new OtpResource($data));
    }

   

    public function show($id)
    {
        $data = $this->register->show($id);
        return $this->okResponse(new ProfileResource($data));
    }

    public function update($id, UpdateRequest $request)
    {


        $validation = $request->validated();

        $data =  $this->register->update($id, $validation);

        return $this->okResponse(new ProfileResource($data));
    }

    public function destroy($id)
    {
        $this->register->destroy($id);
        return $this->okResponse(message: 'register deleted successfully' , data: [
            'register deleted successfully' => ErrorStatusEnum::DeleteAcount
        ]);
     }
}
