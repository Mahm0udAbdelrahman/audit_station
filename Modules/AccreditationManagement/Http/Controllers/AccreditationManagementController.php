<?php

namespace Modules\AccreditationManagement\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\AccreditationManagement\Http\Requests\StoreRequest;
use Modules\AccreditationManagement\Http\Requests\UpdateRequest;
use Modules\AccreditationManagement\Services\AccreditationManagementService;
use Modules\AccreditationManagement\Transformers\AccreditationManagementResource;

class AccreditationManagementController extends Controller
{
    use HttpResponse;
    public $AccreditationManagement;
    public function __construct(AccreditationManagementService $AccreditationManagement)
    {
        $this->AccreditationManagement = $AccreditationManagement;
    }

    public function index()
    {

        $data = $this->AccreditationManagement->index();
        return $this->paginatedResponse($data, AccreditationManagementResource::class);

    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->AccreditationManagement->store($validation);
        return $this->okResponse(new AccreditationManagementResource($data));
     }

    public function show($id)
    {
        $data = $this->AccreditationManagement->show($id);
        return $this->okResponse(new AccreditationManagementResource($data));
    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();
        $data =  $this->AccreditationManagement->update($id, $validation);
        return $this->okResponse(new AccreditationManagementResource($data));
    }

    public function destroy($id)
    {
        $this->AccreditationManagement->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }
}
