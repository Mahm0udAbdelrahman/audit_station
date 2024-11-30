<?php

namespace Modules\CreateUser\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\CreateUser\Http\Requests\StoreRequest;
use Modules\CreateUser\Http\Requests\UpdateRequest;
use Modules\CreateUser\Services\CreateUserService;
use Modules\CreateUser\Transformers\CreateUserResource;

class CreateUserController extends Controller
{
    use HttpResponse;
    public $register;
    public function __construct(CreateUserService $register)
    {
        $this->register = $register;
    }

    public function index()
    {

        $data = $this->register->index();
        return $this->paginatedResponse($data, CreateUserResource::class);
    }

    public function store(StoreRequest $request)
    {
        
        $validation = $request->validated();
        $data = $this->register->store($validation);

        return $this->okResponse(new CreateUserResource($data));
    }

    public function show($id)
    {
        $data = $this->register->show($id);
        return $this->okResponse(new CreateUserResource($data));
    }

    public function update($id, UpdateRequest $request)
    {


        $validation = $request->validated();

        $data =  $this->register->update($id, $validation);

        return $this->okResponse(new CreateUserResource($data));
    }

    public function destroy($id)
    {
        $this->register->destroy($id);

        return response()->json(['message' => 'register deleted successfully']);
    }
}
