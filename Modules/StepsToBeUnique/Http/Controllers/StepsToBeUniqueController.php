<?php

namespace Modules\StepsToBeUnique\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\StepsToBeUnique\Http\Requests\StoreRequest;
use Modules\StepsToBeUnique\Http\Requests\UpdateRequest;
use Modules\StepsToBeUnique\Services\StepsToBeUniqueService;
use Modules\StepsToBeUnique\Transformers\StepsToBeUniqueResource;

class StepsToBeUniqueController extends Controller
{
    use HttpResponse;

    public $StepsToBeUnique;
    public function __construct(StepsToBeUniqueService $StepsToBeUnique)
    {
        $this->StepsToBeUnique = $StepsToBeUnique;
    }

    public function index()
    {

        $data = $this->StepsToBeUnique->index();
        return $this->paginatedResponse($data, StepsToBeUniqueResource::class);
     }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->StepsToBeUnique->store($validation);
        return $this->okResponse(new StepsToBeUniqueResource($data));
     }

    public function show($id)
    {
        $data = $this->StepsToBeUnique->show($id);
        return $this->okResponse(new StepsToBeUniqueResource($data));
    }

    public function update($id, UpdateRequest $request)
    {
        $validation = $request->validated();

        $data =  $this->StepsToBeUnique->update($id, $validation);

        return $this->okResponse(new StepsToBeUniqueResource($data));
    }

    public function destroy($id)
    {
        $this->StepsToBeUnique->destroy($id);

        return response()->json(['message' => 'StepsToBeUnique deleted successfully']);
    }
}
