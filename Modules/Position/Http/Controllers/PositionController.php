<?php

namespace Modules\Position\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Position\Http\Requests\StoreRequest;
use Modules\Position\Http\Requests\UpdateRequest;
use Modules\Position\Services\PositionService;
use Modules\Position\Transformers\PositionResource;

class PositionController extends Controller
{
    use HttpResponse;
    public $position;
    public function __construct(PositionService $position)
    {
        $this->position = $position;
    }

    public function index()
    {
        $data = $this->position->index();
        return $this->paginatedResponse($data, PositionResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->position->store($validation);

        return $this->okResponse(new PositionResource($data));
    }

    public function show($id)
    {
        $data = $this->position->show($id);
        return $this->okResponse(new PositionResource($data));
    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->position->update($id, $validation);

        return $this->okResponse(new PositionResource($data));
    }

    public function destroy($id)
    {
        $this->position->destroy($id);

        return response()->json(['message' => 'position deleted successfully']);
    }
}
