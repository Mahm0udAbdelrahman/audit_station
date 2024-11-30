<?php

namespace Modules\OurTeam\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\OurTeam\Services\OurTeamService;
use Modules\OurTeam\Http\Requests\StoreRequest;
use Modules\OurTeam\Http\Requests\UpdateRequest;
use Modules\OurTeam\Transformers\OurTeamResource;

class OurTeamController extends Controller
{
    use HttpResponse;
    public $OurTeam;
    public function __construct(OurTeamService $OurTeam)
    {
        $this->OurTeam = $OurTeam;
    }

    public function index()
    {
        // if(request()->has('name'))
        // {
        //     $data = $this->OurTeam->index();
        //     return ApiResource::getResponse(200, 'OurTeam Search data', OurTeamResource::collection($data));

        // }
        if (request()->has('name')) {
            $data = $this->OurTeam->index();

            if ($data->isEmpty()) {
                return response()->json(['message' => 'OurTeam not found Data'], 404);
            }

            return ApiResource::getResponse(200, 'OurTeam Search data', OurTeamResource::collection($data));
        }

        $data = $this->OurTeam->index();
        return $this->paginatedResponse($data, OurTeamResource::class);
        // return ApiResource::getResponse(200, 'OurTeam get all data', OurTeamResource::collection($data));

    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->OurTeam->store($validation);
        return $this->okResponse(new OurTeamResource($data));
     }

    public function show($id)
    {
        $data = $this->OurTeam->show($id);
        return $this->okResponse(new OurTeamResource($data));

    }

    public function update($id, UpdateRequest $request)
    {


        $validation = $request->validated();

        $data =  $this->OurTeam->update($id, $validation);

        return $this->okResponse(new OurTeamResource($data));



     }

    public function destroy($id)
    {
        $this->OurTeam->destroy($id);

        return response()->json(['message' => 'OurTeam deleted successfully']);
    }
}
