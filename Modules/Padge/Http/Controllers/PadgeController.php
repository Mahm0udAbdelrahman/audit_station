<?php

namespace Modules\Padge\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Padge\Http\Requests\StoreRequest;
use Modules\Padge\Http\Requests\UpdateRequest;
use Modules\Padge\Services\PadgeService;
use Modules\Padge\Transformers\PadgeResource;

class PadgeController extends Controller
{
    use HttpResponse;
    public $Padge;
    public function __construct(PadgeService $Padge)
    {
        $this->Padge = $Padge;
    }

    public function index()
    {
        $data = $this->Padge->index();
        return $this->paginatedResponse($data, PadgeResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->Padge->store($validation);
        return $this->okResponse(new PadgeResource($data));
    }

    public function show($id)
    {
        $data = $this->Padge->show($id);
        return $this->okResponse(new PadgeResource($data));
    }

    public function update($id, UpdateRequest $request)
    {


        $validation = $request->validated();

        $data =  $this->Padge->update($id, $validation);

        return $this->okResponse(new PadgeResource($data));
    }

    public function destroy($id)
    {
        $this->Padge->destroy($id);

        return response()->json(['message' => 'Padge deleted successfully']);
    }
}
