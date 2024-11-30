<?php

namespace Modules\Statistic\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Statistic\Http\Requests\StoreRequest;
use Modules\Statistic\Http\Requests\UpdateRequest;
use Modules\Statistic\Services\StatisticService;
use Modules\Statistic\Transformers\StatisticResource;

class StatisticController extends Controller
{
    use HttpResponse;

    public  $StatisticServices;

    public function __construct(StatisticService $StatisticServices)
    {
        $this->StatisticServices = $StatisticServices;
    }

    public function index()
    {

        $data = $this->StatisticServices->index();

        return $this->paginatedResponse($data, StatisticResource::class);

     }

    public function store(StoreRequest $request)
    {

        $Statistic  = $request->validated();
        $data = $this->StatisticServices->store($Statistic);

        return $this->okResponse(new StatisticResource($data));

     }

    public function show($id)
    {
        $data = $this->StatisticServices->show($id);
        return $this->okResponse(new StatisticResource($data));
    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->StatisticServices->update($id, $validation);

        return $this->okResponse(new StatisticResource($data));
    }

    public function destroy($id)
    {
        $this->StatisticServices->destroy($id);

        return response()->json(['message' => 'Statistic deleted successfully']);
    }
}
