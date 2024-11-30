<?php

namespace Modules\Permission\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Permission\Http\Requests\StoreRequest;
use Modules\Permission\Http\Requests\UpdateRequest;
use Modules\Permission\Services\RoleService;
use Modules\Permission\Transformers\RoleResource;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    use HttpResponse;
    public $role;
    public function __construct(RoleService $role)
    {
        $this->role = $role;

    }

    public function index()
    {
        $data = $this->role->index();
        return $this->paginatedResponse($data, RoleResource::class);
     }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->role->store($validation);
        return $this->okResponse(new RoleResource($data));
     }

    public function show($id)
    {
        $data = $this->role->show($id);
        return $this->okResponse(new RoleResource($data));
    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->role->update($id, $validation);

        return $this->okResponse(new RoleResource($data));
    }

    public function destroy($id)
    {
        $this->role->destroy($id);

        return response()->json(['message' => 'role deleted successfully']);
    }

}
