<?php

namespace Modules\Service\Http\Controllers;

use App\Helpers\ApiResource;
use App\Traits\HttpResponse;
use App\Http\Controllers\Controller;
use Modules\Service\Services\ServiceService;
use Modules\Service\Http\Requests\StoreRequest;
use Modules\Service\Http\Requests\UpdateRequest;
use Modules\Service\Transformers\ServiceResource;

class ServiceController extends Controller
{
    use HttpResponse;
    public $service;
    public function __construct(ServiceService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        if (request()->has('title')) {
            $data = $this->service->index();
            return ApiResource::getResponse(200, 'Service Search data', ServiceResource::collection($data));
        }

        $data = $this->service->index();
        return $this->paginatedResponse($data, ServiceResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->service->store($validation);
        return $this->okResponse(new ServiceResource($data));
    }

    public function show($id)
    {
        $data = $this->service->show($id);

        return $this->okResponse(new ServiceResource($data));
    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->service->update($id, $validation);

        return $this->okResponse(new ServiceResource($data));
    }

    public function destroy($id)
    {
        $this->service->destroy($id);

        return response()->json(['message' => 'service deleted successfully']);
    }
}
